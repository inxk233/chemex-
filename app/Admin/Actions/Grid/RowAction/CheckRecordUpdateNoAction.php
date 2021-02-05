<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\CheckRecord;
use App\Models\CheckTrack;
use App\Services\NotificationService;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class CheckRecordUpdateNoAction extends RowAction
{
    public function __construct($title = null)
    {
        parent::__construct($title);
        $this->title = '❌ ' . admin_trans_label('Cancel Check');
    }

    /**
     * 处理动作逻辑
     * @return Response
     */
    public function handle(): Response
    {
        if (!Admin::user()->can('check.record.update.no')) {
            return $this->response()
                ->error(trans('main.unauthorized'))
                ->refresh();
        }

        $check_tracks = CheckTrack::where('check_id', $this->getKey())->get();
        foreach ($check_tracks as $check_track) {
            $check_track->delete();
        }
        $check_record = CheckRecord::where('id', $this->getKey())->firstOrFail();
        if ($check_record->status == 1) {
            return $this->response()
                ->warning(admin_trans_label('Cancel Fail Done'));
        }
        if ($check_record->status == 2) {
            return $this->response()
                ->warning(admin_trans_label('Cancel Fail Cancelled'));
        }

        NotificationService::deleteNotificationWhenCheckFinishedOrCancelled($this->getKey());

        $check_record->status = 2;
        $check_record->save();
        return $this->response()
            ->success(admin_trans_label('Cancelled'))
            ->refresh();
    }

    /**
     * 对话框
     * @return string[]
     */
    public function confirm(): array
    {
        return [admin_trans_label('Cancel Confirm'), admin_trans_label('Cancel Confirm Description')];
    }
}
