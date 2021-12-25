<?php
namespace App\Services\Paycom\models;

use App\Models\All_transaction;
use App\Services\Paycom\helpers\FormatHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Services\Paycom\models\PaycomTransaction
 *
 * @property int $id
 * @property string $paycom_transaction_id
 * @property string $paycom_time
 * @property string $paycom_time_datetime
 * @property string $create_time
 * @property string|null $perform_time
 * @property string|null $cancel_time
 * @property int $amount
 * @property int $state
 * @property int|null $reason
 * @property string|null $receivers
 * @property int $booking_id
 * @property-read \App\Domain\Booking\Models\Booking $booking
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereBookingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereCancelTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereCreateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction wherePaycomTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction wherePaycomTimeDatetime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction wherePaycomTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction wherePerformTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereReceivers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Services\Paycom\models\PaycomTransaction whereState($value)
 * @mixin \Eloquent
 */
class PaycomTransaction extends Model
{

    const TIMEOUT = 43200000;

    const STATE_CREATED                  = 1;
    const STATE_COMPLETED                = 2;
    const STATE_CANCELLED                = -1;
    const STATE_CANCELLED_AFTER_COMPLETE = -2;

    const REASON_RECEIVERS_NOT_FOUND         = 1;
    const REASON_PROCESSING_EXECUTION_FAILED = 2;
    const REASON_EXECUTION_FAILED            = 3;
    const REASON_CANCELLED_BY_TIMEOUT        = 4;
    const REASON_FUND_RETURNED               = 5;
    const REASON_UNKNOWN                     = 10;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function transaction()
    {
        return $this->belongsTo(All_transaction::class);
    }

    public function isExpired()
    {
        // for example, if transaction is active and passed TIMEOUT milliseconds after its creation, then it is expired
        return $this->state == self::STATE_CREATED && FormatHelper::timestamp(true) - FormatHelper::datetime2timestamp($this->create_time) > self::TIMEOUT;
    }

    public function cancel($reason)
    {
        $this->cancel_time = FormatHelper::timestamp2datetime(FormatHelper::timestamp());

        if ($this->state == self::STATE_COMPLETED) {
            // Scenario: CreateTransaction -> PerformTransaction -> CancelTransaction
            $this->state = self::STATE_CANCELLED_AFTER_COMPLETE;
        } else {
            // Scenario: CreateTransaction -> CancelTransaction
            $this->state = self::STATE_CANCELLED;
        }

        $this->reason = $reason;

        $this->save();
    }
}
