<?php

namespace Botble\InsertHeaderAndFooter\Http\Controllers;

use Botble\Base\Forms\FormBuilder;
use Botble\Base\Http\Controllers\BaseController;
use Botble\InsertHeaderAndFooter\Forms\UpdateForm;
use Botble\Setting\Repositories\Interfaces\SettingInterface;
use Botble\Setting\Supports\SettingStore;
use Illuminate\Http\Request;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Assets;

class InsertHeaderAndFooterController extends BaseController
{

    /**
     * @var SettingInterface
     */
    protected $settingRepository;

    /**
     * @var SettingStore
     */
    protected $settingStore;

    /**
     * @param SettingInterface $settingRepository
     * @param SettingStore $settingStore
     */
    public function __construct(SettingInterface $settingRepository, SettingStore $settingStore)
    {
        $this->settingRepository = $settingRepository;
        $this->settingStore = $settingStore;
    }

    /**
     * @return array|string
     * @throws \Throwable
     *
     * @author thuandc@bytesoft.net
     */
    public function index(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/insert-header-and-footer::insert-header-and-footer.name'));

        Assets::addStylesDirectly([
            'vendor/core/libraries/codemirror/lib/codemirror.css',
            'vendor/core/libraries/codemirror/addon/hint/show-hint.css',
        ])
            ->addScriptsDirectly([
                'vendor/core/libraries/codemirror/lib/codemirror.js',
                'vendor/core/libraries/codemirror/lib/css.js',
                'vendor/core/libraries/codemirror/addon/hint/show-hint.js',
                'vendor/core/libraries/codemirror/addon/hint/anyword-hint.js',
                'vendor/core/libraries/codemirror/addon/hint/css-hint.js',
                'vendor/core/plugins/insert-header-and-footer/js/insert-header-and-footer.js',
            ]);

        return $formBuilder->create(UpdateForm::class)->renderForm();
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     *
     * @author thuandc@bytesoft.net
     */
    public function postEdit(Request $request, BaseHttpResponse $response)
    {
        $this->saveSettings($request->except(['_token']));

        return $response
            ->setPreviousUrl(route('insert-header-and-footer.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param array $data
     *
     * @author thuandc@bytesoft.net
     */
    protected function saveSettings(array $data)
    {
        foreach ($data as $settingKey => $settingValue) {
            $this->settingStore->set($settingKey, $settingValue);
        }
        $this->settingStore->save();
    }

}
