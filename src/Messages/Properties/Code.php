<?php declare(strict_types=1);

namespace Muscobytes\CdekWebhook\Messages\Properties;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CREATED()
 * @method static self REMOVED()
 * @method static self RECEIVED_AT_SHIPMENT_WAREHOUSE()
 * @method static self DELIVERED()
 * @method static self NOT_DELIVERED()
 * @method static self READY_TO_SHIP_AT_SENDING_OFFICE()
 * @method static self PASSED_TO_CARRIER_AT_SENDING_OFFICE()
 * @method static self SEND_TO_RECIPIENT_OFFICE()
 * @method static self ACCEPTED_AT_DELIVERY_WAREHOUSE()
 * @method static self ISSUED_FOR_DELIVERY()
 * @method static self ACCEPTED_AT_WAREHOUSE_ON_DEMAND()
 * @method static self ACCEPTED_TO_OFFICE_TRANSIT_WAREHOUSE()
 * @method static self RETURNED_TO_SENDER_WAREHOUSE()
 * @method static self RETURNED_TO_TRANSIT_WAREHOUSE()
 * @method static self RETURNED_TO_DELIVERY_WAREHOUSE()
 * @method static self READY_TO_SHIP_IN_TRANSIT_OFFICE()
 * @method static self PASSED_TO_CARRIER_AT_TRANSIT_OFFICE()
 * @method static self SEND_TO_TRANSIT_OFFICE()
 * @method static self MET_AT_TRANSIT_OFFICE()
 * @method static self SEND_TO_SENDING_OFFICE()
 * @method static self MET_AT_SENDING_OFFICE()
 * @method static self ENTERED_TO_OFFICE_TRANSIT_WAREHOUSE()
 * @method static self ENTERED_TO_DELIVERY_WAREHOUSE()
 * @method static self ENTERED_TO_WAREHOUSE_ON_DEMAND()
 * @method static self IN_CUSTOMS_INTERNATIONAL()
 * @method static self SHIPPED_TO_DESTINATION()
 * @method static self PASSED_TO_TRANSIT_CARRIER()
 * @method static self IN_CUSTOMS_LOCAL()
 * @method static self CUSTOMS_COMPLETE()
 * @method static self POSTOMAT_POSTED()
 * @method static self POSTOMAT_SEIZED()
 * @method static self POSTOMAT_RECEIVED()
 * @method static self READY_FOR_SHIPMENT_IN_SENDER_CITY()
 * @method static self TAKEN_BY_TRANSPORTER_FROM_SENDER_CITY()
 * @method static self SENT_TO_TRANSIT_CITY()
 * @method static self ACCEPTED_IN_TRANSIT_CITY()
 * @method static self ACCEPTED_AT_TRANSIT_WAREHOUSE()
 * @method static self TAKEN_BY_TRANSPORTER_FROM_TRANSIT_CITY()
 * @method static self SENT_TO_RECIPIENT_CITY()
 * @method static self ACCEPTED_IN_RECIPIENT_CITY()
 * @method static self ACCEPTED_AT_PICK_UP_POINT()
 * @method static self TAKEN_BY_COURIER()
 * @method static self RETURNED_TO_RECIPIENT_CITY_WAREHOUSE()
 * @method static self ACCEPTED_AT_RECIPIENT_CITY_WAREHOUSE()
 * @method static self READY_FOR_SHIPMENT_IN_TRANSIT_CITY()
 * @method static self ACCEPTED()
 * @method static self RETURNED_TO_SENDER_CITY_WAREHOUSE()
 * @method static self SENT_TO_SENDER_CITY()
 * @method static self ACCEPTED_IN_SENDER_CITY()
 * @method static self INVALID()
 */
final class Code extends Enum
{
    //
}