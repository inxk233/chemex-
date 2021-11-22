<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\BatchAction;
use Dcat\Admin\Traits\HasPermissions;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class DeviceBiaoqianPrint extends BatchAction
{
    /**
     */
    protected $title = '打印标签';

    /**
     * Handle the action request.
     *
     * @param Request $request
     *
     */
    public function handle(Request $request)
    {
        $keys = $this->getkey();
        $url = admin_route("device.biaoqian.print", ["ids" => implode("-", $keys)]);
        if (count($keys) > 0) {
            return $this->response()->script("window.open('{$url}')");
        }
    }


    /**
     *
     */
    public function confirm()
    {
        // return ['Confirm?', 'contents'];
    }

    public function actionScript()
    {
        $warning = "请选择打印的设备！";
        return <<<JS
function (data, target, action) {
 var key = {$this->getSelectedKeysScript()}
 if (key.length === 0) {
     Dcat.warning('{$warning}');
     return false;
 }
 // 设置主键为复选框选中的行ID数组
 action.options.key = key;
}
JS;
    }

    /**
     * @param Model|Authenticatable|HasPermissions|null $user
     *
     *
     */
    protected function authorize($user): bool
    {
        return true;
    }

    /**
     *
     */
    protected function parameters()
    {
        return [];
    }

    protected function html()
    {
        return <<<HTML
<a {$this->formatHtmlAttributes()}><button class="btn btn-primary btn-mini">{$this->title()}</button></a>


HTML;
    }
}
