<?php

namespace App\Transformers;

use App\LogOrder;
use App\Transformers\PostTransformer;
use League\Fractal\TransformerAbstract;

class LogOrderTransformer extends TransformerAbstract
{

    public function transform(LogOrder $log)
    {
        return [
            'order_id'  => $log->order_id,
            'message'  => $log->message,
            'category'  => "Approve",
            'created_at' => $log->created_at,
        ];
    }
}
