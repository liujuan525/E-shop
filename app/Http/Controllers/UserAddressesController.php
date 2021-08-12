<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    // 列表
    public function index(Request $request)
    {
        return view('user_addresses.index', ['addresses' => $request->user()->addresses]);
    }

    // 添加
    public function create()
    {
        return view('user_addresses.create_and_edit', ['address' => new UserAddress()]);
    }

    // 创建
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        return redirect()->route('user_addresses.index');
    }

    // 编辑
    public function edit(UserAddress $user_address)
    {
        return view('user_addresses.create_and_edit', ['address' => $user_address]);
    }

    // 修改
    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $user_address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        return redirect()->route('user_addresses.index');
    }



}
