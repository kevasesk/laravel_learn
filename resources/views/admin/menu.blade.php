@extends('admin.layouts.main')

@section('title')
   Menus Tree
@endsection

@section('content')
    <div class="row">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="border-top">
                <div class="card-body">
                    <button type="button" class="btn btn-info text-white" onclick="newItem();">New Item</button>
                    <button type="button" class="btn btn-success text-white" onclick="saveTree();">Save Tree</button>
                    <button type="button" class="btn btn-danger text-white" onclick="window.location='{{ route('admin.menu') }}'">Cancel</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-6">
            <div id="menu-tree" style="background-color: white; padding: 5px;"></div>
        </div>
        <div class="col-6">
            <div class="info">
                <div class="card">
                    <form method="POST" action="">
                        @csrf
                        <div class="card-body">
                            <input type="text" name="id" class="hide" value="">
                            <input type="text" name="parent" class="hide" value="">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Url</label>
                                <input type="text" name="url" class="form-control" value="">
                            </div>
                        </div>
                        <div class="border-top">
                            <div class="card-body">
                                <button type="button" class="btn btn-success text-white" onclick="saveItem();">
                                    Save
                                </button>
                                <button type="button" class="btn btn-danger text-white" onclick="window.location='{{ route('admin.menu') }}'">
                                    Cancel
                                </button>
                                <button type="button" class="btn btn-danger text-white" onclick="deleteItem();">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
        $('#menu-tree').jstree({
            "plugins" : [ "dnd"],
            'core' : {
                "check_callback" : true,
                'data' : {
                    'url' : function (node) {
                        return '{{ route("admin.menu.get") }}';
                    },
                }
            }
        }).on('activate_node.jstree', function(event, node){
            console.log(node.node);//eugenesm
            console.log('parent'+node.node.parent);//eugenesm
            var idElement = document.getElementsByName('id')[0];
            var titleElement = document.getElementsByName('title')[0];
            var urlElement = document.getElementsByName('url')[0];
            var parentElement = document.getElementsByName('parent')[0];
            idElement.value = node.node.li_attr['id'] ?? node.node.original['id'];
            titleElement.value = node.node.li_attr['data-title'] ?? node.node.original['text'];
            urlElement.value = node.node.li_attr['data-url'] ?? '';
            parentElement.value = node.node.li_attr['data-parent'] ?? node.node.parent;
        });
        var saveItem = function(){
            var idElement = document.getElementsByName('id')[0];
            var parentElement = document.getElementsByName('parent')[0];
            var titleElement = document.getElementsByName('title')[0];
            var urlElement = document.getElementsByName('url')[0];
            var tokenElement = document.getElementsByName('_token')[0];
            $.ajax({
                url: "{{ route('admin.menu.saveItem') }}",
                type: "POST",
                data:{
                    id: idElement.value,
                    title:  titleElement.value,
                    url: urlElement.value,
                    parent: parentElement.value,
                    _token: tokenElement.value
                },
                success: function(response){
                    if(response.status == 'error'){
                        notify(response.message, 'error');
                    }
                    if(response.status == 'success'){
                        notify(response.message);
                    }

                },
            });
        }
        var deleteItem = function(){
            var confirmed = confirm('Are you sure?');
            if(confirmed){
                var idElement = document.getElementsByName('id')[0];
                var tokenElement = document.getElementsByName('_token')[0];
                $.ajax({
                    url: "{{ route('admin.menu.deleteItem') }}",
                    type: "POST",
                    data:{
                        id: idElement.value,
                        _token: tokenElement.value
                    },
                    success: function(response){
                        if(response.status == 'error'){
                            notify(response.message, 'error');
                        }
                        if(response.status == 'success'){
                            window.location.reload();
                        }
                    },
                });
            }
        }
        var newItem = function(){
            $('#menu-tree').jstree().create_node('#', {
                "id": Date.now(),
                "text": "New Item"
            }, "last");
        }
        var saveTree = function(){
            var treeObjects = $('#menu-tree').jstree(true).get_json('#', {flat:true})
            var jsonTree = JSON.stringify(treeObjects);
            var tokenElement = document.getElementsByName('_token')[0];
            $.ajax({
                url: "{{ route('admin.menu.save') }}",
                type: "POST",
                data:{
                    jsonTree: jsonTree,
                    _token: tokenElement.value
                },
                success: function(response){
                    if(response.status == 'error'){
                        notify(response.message, 'error');
                    }
                    if(response.status == 'success'){
                        window.location.reload();
                    }
                },
            });

        }
    </script>
@endsection

