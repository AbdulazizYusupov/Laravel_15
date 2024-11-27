<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="{{route('agent.index')}}">Agents</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('product.index')}}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('order.index')}}">Orders</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <h1>Agents</h1>
            <button href="{{route('agent.store')}}" class="btn btn-info mt-2" data-bs-toggle="modal"
                    data-bs-target="#addAgentModal">Add Agent
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addAgentModal" tabindex="-1" aria-labelledby="addAgentModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addAgentModalLabel">Add Agent</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('agent.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <input type="text" name="name" class="form-control" placeholder="Name" required><br>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" required><br>
                                <select name="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    @foreach($models as $model)
                                        <option value="{{$model->id}}">{{$model->name}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $model)
                    <tr>
                        <th>{{$model->id}}</th>
                        <td>{{$model->parent_id != 0 ? $model->parent->name : 'None'}}</td>
                        <td>{{$model->name}}</td>
                        <td>{{$model->phone}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{$models->links()}}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
