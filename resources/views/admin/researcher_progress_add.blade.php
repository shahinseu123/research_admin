@extends('admin.layout.master')

@section('title')
    <title>Add progress</title>
@endsection

@section('main')
    <section>

        <div class="flex justify-between">
            <h1 class="py-1 font-semibold text-3xl text-gray-600 uppercase">add progress</h1>
        </div>
        <form action="{{ route('progress-create') }}" method="post">
            @csrf
            <div class=" gap-4 mt-3">
                <div class="">
                    <div class="bg-white shadow-lg rounded p-4">
                        <div class="mb-4">
                            <label for="title" class="font-semibold">Title <span class="text-red-500">*</span></label>
                            <input class="input-border rounded px-2 py-1 w-full mt-2" type="text" name="title" id="title"
                                required value="{{ old('title') }}">
                            @error('title')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="font-semibold">Description<span
                                    class="text-red-500">*</span></label>
                            <textarea class="input-border rounded px-2 py-1 w-full" style="margin-top: 10px;z-index: -1" name="description"
                                id="editor" cols="30" rows="5"></textarea>
                            @error('description')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="border-t-2 border-gray-300">
                            <button class="px-5 py-1 text-white  btn_secondary rounded shadow-lg mt-3 m"
                                type="submit">CREATE</button>
                            <p>NB: <span class="text-red-600"> * </span>marked are required field.</p>
                        </div>
                    </div>
                </div>
        </form>
    </section>
@endsection

@section('head')
    <style>
        .ck-blurred {
            min-height: 300px;
        }
    </style>
@endsection

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor_2'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
