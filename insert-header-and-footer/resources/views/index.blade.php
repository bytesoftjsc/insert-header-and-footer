@extends('core/base::layouts.master')
@section('content')
    {!! Form::open(['route' => ['insert-header-and-footer.edit']]) !!}
    <div class="max-width-1200">
        <div class="flexbox-annotated-section">
            <div class="flexbox-annotated-section-content">
                <div class="wrapper-content pd-all-20">
                    <div class="form-group">
                        <label class="text-title-field"
                               for="cache_time">{{ trans('plugins/insert-header-and-footer::insert-header-and-footer.insert.header') }}</label>
                        <textarea type="text" class="next-input" name="insert_to_header"
                                  id="insert_to_header">{{ setting('insert_to_header') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="text-title-field"
                               for="cache_time">{{ trans('plugins/insert-header-and-footer::insert-header-and-footer.insert.footer') }}</label>
                        <textarea type="text" class="next-input" name="insert_to_footer"
                                  id="insert_to_footer">{{ setting('insert_to_footer') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="flexbox-annotated-section" style="border: none">
            <div class="flexbox-annotated-section-annotation">
            </div>
            <div class="flexbox-annotated-section-content">
                <button class="btn btn-info"
                        type="submit">{{ trans('core/setting::setting.save_settings') }}</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
