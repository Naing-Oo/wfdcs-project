@extends('web.layout.template')

@section('content')
    <!-- Breadcrumb Section Begin -->
    @include('web.common.breadcrumb', [
        'title' => 'Blog',
    ])
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">

        <div class="container">

            <div class="row">
                {{-- left --}}
                @include('web.blog.sidebar')

                {{-- right --}}
                @include('web.blog.grid')


            </div>

        </div>

    </section>
    <!-- Blog Section End -->
@endsection
