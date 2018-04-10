<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\ConfigViewBlade;
use App\Models\ImageViewBlade;
use App;

class ViewComposer
{
    public function __construct()
    {
        $locale = App::getLocale();

        $configViews = ConfigViewBlade::all();
        foreach ($configViews as $configView) {
            if ($locale == 'en') {
                $data_configView[$configView->name] = $configView->value_en;
            } else {
                $data_configView[$configView->name] = $configView->value;
            }
        }
        $this->data_configView = $data_configView;
        $img_logo_footer = ImageViewBlade::where('name', 'footer-logo')->first();
        $this->footer_logo = $img_logo_footer['images'];

        $footer_certificate1 = ImageViewBlade::where('name', 'footer-certificate1')->first();
        $this->footer_certificate1 = $footer_certificate1['images'];

        $footer_certificate2 = ImageViewBlade::where('name', 'footer-certificate2')->first();
        $this->footer_certificate2 = $footer_certificate2['images'];

        $footer_certificate3 = ImageViewBlade::where('name', 'footer-certificate3')->first();
        $this->footer_certificate3 = $footer_certificate3['images'];

        $footer_certificate4 = ImageViewBlade::where('name', 'footer-certificate4')->first();
        $this->footer_certificate4 = $footer_certificate4['images'];
    }

    public function compose(View $view)
    {
        $view->with('data_configView', $this->data_configView);
        $view->with('img_logo_footer', $this->footer_logo);
        $view->with('footer_certificate1', $this->footer_certificate1);
        $view->with('footer_certificate2', $this->footer_certificate2);
        $view->with('footer_certificate3', $this->footer_certificate3);
        $view->with('footer_certificate4', $this->footer_certificate4);
    }
}