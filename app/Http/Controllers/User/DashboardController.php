<?php

namespace App\Http\Controllers\User;

use App\Helper\Helper;
use App\Models\User\Customer;
use App\Models\User\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends UserBaseController
{
    public function index()
    {
        $userId = Auth::id();
        $currentPage = 'dashboard';
        $accountVerified = Customer::isAccountVerified($userId);
        $totalSpent = Order::getMyTotalSpent($userId);
        $walletBalance = Customer::getCurrentWalletBalance($userId);
        $orders = Order::where('user_id', $userId);
        $myOrders = $orders->count();
        $canceledOrders = $orders->where('status', Order::CANCELED)->count();

        return view('customer.dashboard.dashboard',[
            'accountVerified' => $accountVerified,
            'currentPage' => $currentPage,
            'total_orders' => $myOrders,
            'total_spent' => Helper::formatTheNumber($totalSpent),
            'wallet_balance' => Helper::formatTheNumber($walletBalance),
            'canceled_orders' => $canceledOrders,
        ]);
    }
}
