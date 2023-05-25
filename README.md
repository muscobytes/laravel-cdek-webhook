# CDEK webhook handler for Laravel

## Установка

```bash
composer require muscobytes/laravel-cdek-webhook
```

## Настройка

Настройка пакета заключается в определении URL для обработки запросов от CDEK. Это можно сделать двумя способами: установка переменной через файл `.env` или определение переменной в файле `config/cdek.php`.

### .env

В файл `.env` необходимо добавить следующую строку:

```dotenv
CDEK_WEBHOOK_URL=/api/cdek/webhook
```

### config/cdek.php

Для определения URL посредством файла конфигурации необходимо опубликовать файл конфигурации:

```bash
php artisan vendor:publish --provider="Muscobytes\CdekWebhook\CdekWebhookServiceProvider" --tag="config"
```

В файле `config/cdek.php` необходимо определить значение для ключа `webhook_url`:

```php
<?php
return [
    'webhook_url' => env('CDEK_WEBHOOK_URL', '/api/cdek/webhook')
];
```

## Использование

При выполнении запроса на URL, определенный в настройках, будет инициирован вызов одного из событий:
- `DownloadPhotoEvent::class`
- `OrderStatusEvent::class`
- `PrealertEvent::class`
- `PrintFormEvent::class`

Для каждого из вышеперечисленных событий вы можете создать собственный обработчик события.

Например, для события `DownloadPhotoEvent::class`:
```bash
php artisan make:listener DownloadPhotoListener
```

В созданном файле `app/Listeners/DownloadPhotoListener.php` необходимо определить метод `handle`:
```php
<?php

namespace App\Listeners;

use App\Jobs\CreateOrderFromPostingJob;
use Muscobytes\OzonSeller\Events\DownloadPhotoEvent;

class DownloadPhotoEventListener
{
    public function handle(
        DownloadPhotoEvent $event
    ): void
    {
        /** @var \Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage $message */
        $message = $event->getMessage();
        // Ваш код
    }
}
```

В свойстве `$message` объекта `DownloadPhotoEvent` находится DTO с данными запроса от СДЭК.

- для `DownloadPhotoEvent` это [Muscobytes\CdekWebhook\Messages\DownloadPhotoMessage](src/Messages/DownloadPhotoMessage.php)
- для `OrderStatusEvent` это [Muscobytes\CdekWebhook\Messages\OrderStatusMessage](src/Messages/OrderStatusMessage.php)
- для `PrealertEvent` это [Muscobytes\CdekWebhook\Messages\PrealertClosedMessage](src/Messages/PrealertClosedMessage.php)
- для `PrintFormEvent` это [Muscobytes\CdekWebhook\Messages\PrintFormMessage](src/Messages/PrintFormMessage.php)

Набор свойств DTO соответствует набору полей, описанных в [документации СДЭК](https://api-docs.cdek.ru/29924139.html).