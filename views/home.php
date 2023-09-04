<?php include 'layouts/header.php' ?>
<?php $current_url = explode("?", $_SERVER['REQUEST_URI'])[0] ?>

<main class="mb-10" id="content">
    <div class="px-4 sm:px-6 lg:px-8 mt-10 mx-auto max-w-7xl">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Горничная "<?= $data->user->name ?? null ?>",
                    статистика за Сентябрь</h1>
            </div>
        </div>
        <div class="mt-4 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Дата
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Начало рабочего дня
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Конец рабочего дня
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Кол-во генеральных уборок
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Кол-во текущих уборок
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Кол-во заездов
                                </th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Сумма оплаты за день
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <?php foreach ($data->stats as $row): ?>
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        <?php $date = date_create($row['date']) ?>
                                        <a href="<?= $current_url ?>?date=<?= $row['date'] ?>" class="hover:text-red-700"><?= date_format($date,"d.m.Y") ?></a>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?php $date = date_create($row['start']) ?>
                                        <?= date_format($date,"H:i:s") ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?php $date = date_create($row['end']) ?>
                                        <?= date_format($date,"H:i:s") ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?= $row['work']['Генеральная'] ?? 0 ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?= $row['work']['Текущая'] ?? 0 ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <?= $row['work']['Заезд'] ?? 0 ?>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 text-right">
                                        <?= $row['price'] ?? 0 ?> руб.
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                            <tfoot class="bg-gray-50">
                            <tr>
                                <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    Итого
                                </th>
                                <th colspan="6" class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">
                                    <?= array_reduce($data->stats, function ($carry, $item) {
                                        return $carry + ($item['price'] ?? 0);
                                    }, 0) ?> руб.
                                </th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'layouts/footer.php' ?>
