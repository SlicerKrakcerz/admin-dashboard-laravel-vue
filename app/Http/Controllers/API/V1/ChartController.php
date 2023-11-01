<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function getChartData()
    {
        $data = [
            'categoryCount' => Category::count(),
            'tagCount' => Tag::count(),
            'userCount' => User::count(),
            'productCount' => Product::count(),
            'productChanges' => $this->getProductChangesLast7Days(),
        ];

        return response()->json($data);
    }

    private function getProductChangesLast7Days()
    {
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->subDays(7);

        $productChanges = Product::whereBetween('created_at', [$startDate, $endDate])->get();
        $changesCount = $productChanges->count();

        return $changesCount;
    }
}
