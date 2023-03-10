<?php

namespace Database\Seeders;

use App\Services\API\CashCheckService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashCheckSeeder extends Seeder
{
    protected $cashCheckService;

    public function __construct(CashCheckService $cashCheckService)
    {
        $this->cashCheckService = $cashCheckService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->cashCheckService->fetchDataFromLastQuarter(2022);

        $filteredData = collect($data)->map(function ($item) {
            return [
                'ref_key' => $item['Ref_Key'] ?? '',
                'number' => $item['Number'] ?? '',
                'amount' => $item['Сумма'] ?? '',
                'is_posted' => isset($item['Posted']),
            ];
        })->toArray();

        if (!empty($filteredData))
        {
            try {
                DB::beginTransaction();

                DB::table('cash_checks')->insert($filteredData);

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
            }
        }
    }
}
