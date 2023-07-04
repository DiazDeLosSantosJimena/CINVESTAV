@extends('layouts.app')
@section('title', 'Create Proposals')

@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Show Proposal</h4>
                    <div class="dropdown-divider"></div>
                    <form class="form-sample" method="post" action="{{ route('proposals.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <h4 class="card-title">Project Info</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="name">Name of Project</label>
                                    <div class="col-sm-9">
                                        <input type="text" value="{{ old('name') }}" class="form-control bg-dark text-white @error('name') is-invalid @enderror" name="name" id="name"/>
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="description">Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control bg-dark text-white @error('description') is-invalid @enderror" rows="4" name="description" id="description">{{ old('description') }}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <h4 class="card-title">Proposal Info</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="archive">Archive</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="archive" id="archive"
                                               class="form-control bg-dark text-white @error('archive') is-invalid @enderror border border-dark"
                                               style="padding: 0.375rem 0.75rem; line-height: 1.5; border-radius: 0.25rem; font-size: 0.875rem; width: 100%; height: calc(1.5em + 0.75rem + 2px); color: #363455; background-color: #000000; background-clip: padding-box; border: 1px solid #343a40; transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;"
                                               >
                                        @error('archive')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="rama_id">Rama Or Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-control text-white" name="rama_id" id="rama_id">
                                            <option selected>Select Rama</option>
                                            @foreach($ramas as $rama)
                                                <option value="{{ $rama->id }}">{{ $rama->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dropdown-divider"></div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <a href="{{ route('proposals.index') }}" class="btn btn-dark">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
