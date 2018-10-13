@extends('layouts.backend.master')

@section('title', 'Add Products')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">@isset('product','name')</h4>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.product.index')}}">List Products</a></li>
        <li class="active">@isset('product','name')</li>
    </ol>
</div>
@stop

@section('content')
<form class="form-horizontal" method="POST">
    @include('backend.products.components.form')
</form>
@stop

@section('script')
<script src="../plugins/bower_components/switchery/dist/switchery.min.js"></script>
<script src="js/cbpFWTabs.js"></script>
<script src="../plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
<script src="../plugins/bower_components/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<script src="../plugins/bower_components/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
    (function () {
        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
            new CBPFWTabs(el);
        });
    })();
</script>
    <!--Style Switcher -->
    <script>
        var JSONattributes =  @json($product->values());
        var JSONskus = @json($product->skus);
        var JSONAtt = @json($product->attr);
        var viewHTML = `{!!view('backend.products.components.item-att')->render()!!}`;
        var viewSku = `{!!view('backend.products.components.sku-item')->render()!!}`;
        var viewVar = `{!!view('backend.products.components.var-item')->render()!!}`;

        var changeAttri = function(index, ind,value){
            JSONskus[index]['values'][ind]['attribute_id'] = value;

            loadViewSku()
        }

        var editInput = function(index, name, value) {
            JSONattributes[index][name] = value;
        }
        
        var editInputSku = function(index, name, value) {
            JSONskus[index][name] = value;
        }

        var addVarSku = function(index)
        {
            JSONskus[index]['values'] = JSONskus[index]['values'] || [];
            JSONskus[index]['values'].push({
                attribute_id: 0,
                value_id: 0
            })

            loadViewSku()
        }
        var showViewAttribute = function (item,index)
        {
            let htmlItem = $(viewHTML)
            htmlItem.find('input').eq(0).attr('name', `attributes[${index}][name]`).attr('value', item.name).attr('onBlur', `editInput(${index},'name',this.value)`)
            htmlItem.find('input').eq(1).attr('name', `attributes[${index}][value]`).attr('value', item.value).attr('onBlur', `editInput(${index},'value',this.value)`)
            htmlItem.find('input').eq(2).attr('name', `attributes[${index}][options]`).attr('value', item.options).attr('onBlur', `editInput(${index},'options',this.value)`)
            htmlItem.find('input').eq(3).attr('name', `attributes[${index}][value_id]`).attr('value', item.value_id || '')
            return htmlItem[0].outerHTML
        }
        var showViewSku = function(item, index){
            let htmlItem = $(viewSku)
            
            htmlItem.find('input').eq(0).attr('name', `skus[${index}][price]`).attr('value', item.price).attr('onBlur', `editInputSku(${index},'price',this.value)`)
            htmlItem.find('input').eq(1).attr('name', `skus[${index}][stock]`).attr('value', item.stock).attr('onBlur', `editInputSku(${index},'stock',this.value)`)
            htmlItem.find('button').eq(0).attr('onClick', `addVarSku(${index})`);

            let parent = htmlItem.children().eq(3).attr('id', `option-${index}`)
           
              if(typeof item.values !== 'undefined'){
                item.values.forEach(function(el,ind){
                   
                    let htmlVar = $(viewVar)
                    let optionAtt = optionValue = "";
                    JSONAtt.forEach(function(element){
                        optionAtt += `<option  value="${element.attribute_id}">${element.name}</option>`;

                        if (el.attribute_id === element.attribute_id) {
                            element.values.forEach(function(elm){
                                optionValue += `<option  value="${elm.value_id}">${elm.value}</option>`;
                            })
                        }
                    })

                    htmlVar.find('select').eq(0).append(optionAtt).attr('onChange', `changeAttri(${index},${ind},this.value)`)
                    htmlVar.find('select').eq(1).append(optionValue)
                    parent.append(htmlVar);
                  
                })
              }

            return htmlItem[0].outerHTML
        }
        function loadView()
        {
            var htmlAttributes = "";
            JSONattributes.map(function(item, index){
                htmlAttributes += showViewAttribute(item,index);
            })

            $('#attributes').html(htmlAttributes)
        }
        function loadViewSku()
        {
            var htmlSkus = "";
            JSONskus.map(function(item, index){
                htmlSkus += showViewSku(item,index);
            })
            $('#skus').html(htmlSkus)
        }


        jQuery(document).ready(function () {
            console.log(JSONattributes)
            if ($("#mymce").length > 0) {
                tinymce.init({
                    selector: "textarea#mymce",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                });
            }
            $('.js-switch').each(function () {
                new Switchery($(this)[0], $(this).data());
            });
            $('.selectpicker').selectpicker();

            $('#createattribute').click(function(e){
                e.preventDefault()
                JSONattributes.push({
                    name: '',
                    value: '',
                    options: ''
                });
                loadView()

            });
            $('#createsku').click(function(e){
                e.preventDefault()
                JSONskus.push({
                    price: 0,
                    stock: 0
                });
                loadViewSku();
            })
            loadViewSku();
            loadView()
        });
    </script>
@stop

@section('style')
<link href="../plugins/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- Menu CSS -->
    <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="../plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="../plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="../plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
@stop