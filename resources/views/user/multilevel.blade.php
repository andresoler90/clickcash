@extends('layouts.master')

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <script src="https://balkangraph.com/js/latest/OrgChart.js"></script>
                <div id="tree" class="col-md-12"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function () {
            var nodes = {!! $multilevel->toJson() !!}

            OrgChart.templates.rony.field_number_children = '<circle cx="60" cy="110" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="115" text-anchor="middle">{val}</text>';

            var chart = new OrgChart(document.getElementById("tree"), {
                template: "rony",
                collapse: {
                    level: 2
                },
                nodeBinding: {
                    field_0: "Nombre",
                    field_1: "Membresia",
                    field_2: "Email",
                    img_0: "img",
                    field_number_children:  function (sender, node) {
                        var args = {
                            count: 0
                        };
                        iterate(sender, node, args);
                        return args.count;
                    }
                }
            });

            var iterate = function (c, n, args){
                args.count += n.childrenIds.length;
                for(var i = 0; i < n.childrenIds.length; i++){
                    var node = c.getNode(n.childrenIds[i]);
                    iterate(c, node, args);
                }
            }

            chart.load(nodes);
        };
    </script>
@endsection
