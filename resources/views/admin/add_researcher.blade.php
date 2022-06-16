@extends('admin.layout.master')

@section('title')
    <title>Researcher's</title>
@endsection

@section('main')
    <section>

        <h1 style="font-size: 30px" class=" font-semibold uppercase text-gray-600">add Researcher</h1>

        <form action="{{ route('researcher-create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="md:flex lg:flex xl:flex gap-4 mt-4">
                <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/3">
                    <div class="shadow-lg bg-white rounded p-4">
                        <div class="lg:grid xl:grid lg:grid-cols-3 xl:grid-cols-3 gap-3">
                            <div>

                                <label for="name">Name <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}" required id="name"
                                    class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('name')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="username">Username <span class="text-red-500">*</span></label>
                                <input type="text" value="{{ old('username') }}" name="username" required id="username"
                                    class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('username')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <label for="email">Email <span class="text-red-500">*</span></label>
                                <input type="text" name="email" value="{{ old('email') }}" required id="email"
                                    class="input-border rounded px-2 py-2 w-full mt-2">
                                @error('email')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="address">Address <span class="text-red-500">*</span></label>
                            <input type="text" name="address" value="{{ old('address') }}" required id="address"
                                class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('address')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/3 xl:w-1/3">
                    <div class="bg-white shadow-lg rounded p-4 mb-4">
                        <div class="mt-2">
                            <label for="profile_img">Profile image <span class="text-red-500">*</span></label>
                            <input type="file" name="profile_img" accept="image/*" value="{{ old('profile_img') }}"
                                id="profile_img" class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('profile_img')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded p-4 mb-4">
                        <div>
                            <label for="password">Password <span class="text-red-500"></span></label>
                            <input type="password" name="password" id="password"
                                class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('password')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation">Confirm Password <span
                                    class="text-red-500">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="input-border rounded px-2 py-2 w-full mt-2">
                            @error('password_confirmation')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="border-t-2 border-gray-300">
                            <button class="w-full py-2 text-white  btn_secondary rounded shadow-lg mt-3 m"
                                type="submit">CREATE</button>
                            <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
@endsection

@section('head')
@endsection

@section('script')
@endsection
