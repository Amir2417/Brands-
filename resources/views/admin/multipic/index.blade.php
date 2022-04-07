<x-app-layout>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-group">
                       @foreach($images as $image)
                        <div class="col-md-4 mt-3 ms-2">
                            <div class="card">
                                <img src="{{asset($image -> images)}}" alt="">
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-group">
                        <div class="card">
                            <div class="card-header">
                                <h2>Add Picture</h2>
                            </div>
                            <div class="card-body">
                                <form action="{{url('/insertImage')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPicture">Select Picture</label>
                                        <input type="file" name="image[]" class="form-control" multiple="">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>