<?php

namespace Botble\InsertHeaderAndFooter\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Setting\Repositories\Interfaces\SettingInterface;
use Botble\Setting\Supports\SettingStore;
use Illuminate\Http\Request;
use Botble\Base\Http\Responses\BaseHttpResponse;

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
     */
    public function index()
    {
        page_title()->setTitle(trans('plugins/insert-header-and-footer::insert-header-and-footer.name'));

        return view('plugins/insert-header-and-footer::index')->render();
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function postEdit(Request $request, BaseHttpResponse $response)
    {
        $this->saveSettings($request->except(['_token']));

        return $response
            ->setPreviousUrl(route('settings.options'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param array $data
     */
    protected function saveSettings(array $data)
    {
        foreach ($data as $settingKey => $settingValue) {
            $this->settingStore->set($settingKey, $settingValue);
        }

        $this->settingStore->save();
    }

}
