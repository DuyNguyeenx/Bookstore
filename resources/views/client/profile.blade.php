@extends('client.templates.layout')
@section('css')
@endsection
@section('main')
    <!-- Open Content -->
    <div class="container my-4">
        <!-- Section: Profile -->
        <section class="profile">
            <div class="">
                @component('templates.form', [
                    'formClass' => 'row',
                    'method' => 'POST',
                    'action' => route('client.profile.update'),
                    'enctype' => 'multipart/form-data',
                    'buttonClass' => 'd-none',
                    'textButton' => 'Lưu',
                ])

                    <div class="col-lg-12">
                        <!-- Profile form -->
                        <form>
                            <!-- Details -->
                            <div class="section bg-white p-3 mb-4 rounded-3">
                                <h2 class="title mb-4">Thông tin chi tiết</h2>
                                @include('templates.input', [
                                    'type' => 'text',
                                    'name' => 'name',
                                    'value' => $user->name,
                                    'label' => 'Họ tên',
                                ])
                                @include('templates.input', [
                                    'type' => 'text',
                                    'name' => 'email',
                                    'value' => $user->email,
                                    'label' => 'email',
                                    'attb' => 'disabled',
                                ])
                                @include('templates.input', [
                                    'type' => 'text',
                                    'name' => 'role',
                                    'value' => $user->role == 0 ? 'thành viên' : 'admin',
                                    'label' => 'Truy cập',
                                    'attb' => 'disabled',
                                ])
                            </div>
                            <!-- Button -->
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                @endcomponent
            </div>
        </section>
    </div>
@endsection
@section('script_footer')
@endsection
