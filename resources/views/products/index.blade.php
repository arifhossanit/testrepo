@extends('layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>


    <div class="card">
        <form action="" method="get" class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Product Title" class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant" id="" class="form-control">

                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="text" name="price_from" aria-label="First name" placeholder="From" class="form-control">
                        <input type="text" name="price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>

        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Variant</th>
                        <th width="150px">Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @forelse ($data as $key=>$item)
                    <tr>
                        <?php 
                        $date=date("F j, Y", strtotime($item->description));
                        ?>
                        <td>{{$key+1}}</td>
                        <td>{{$item->title}} <br> Created at : {{$date}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <dl class="row mb-0" style="height: 80px; overflow: hidden" id="variant">

                                <dt class="col-sm-10 pb-0">
                                    {{$item->variant}}
                                </dt>
                                <dd class="col-sm-12">
                                    <dl class="row mb-0">
                                        <dt class="col-sm-6 pb-0">Price : {{ number_format($item->price,2) }}</dt>
                                        <dd class="col-sm-6 pb-0">InStock : {{ number_format($item->stock) }}</dd>
                                    </dl>
                                </dd>
                            </dl>
                            <button onclick="$('#variant').toggleClass('h-auto')" class="btn btn-sm btn-link">Show more</button>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('product.edit', 1) }}" class="btn btn-success">Edit</a>
                            </div>
                        </td>
                    </tr>
                    @empty
                        <p>No users</p>
                    @endforelse
                    </tbody>

                </table>
            </div>

        </div>

        <div class="card-footer">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <p>Showing {{$data->firstItem()}} to {{$data->lastItem()}} out {!!__('of')!!} {{$data->total()}}</p>
                </div>
                <div class="col-md-2">
                    {{ $data->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection
