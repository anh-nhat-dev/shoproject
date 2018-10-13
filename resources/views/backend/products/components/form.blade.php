<div class="col-md-9">
    <!-- Tabstyle start -->
    <section>
        <div class="sttabs tabs-style-bar">
            <nav>
                <ul>
                    <li><a href="#section-bar-1" class="sticon ti-layout-menu-v"><span>Details</span></a></li>
                    <li><a href="#section-bar-2" class="sticon icon-tag"><span>Attributes</span></a></li>
                    <li><a href="#section-bar-3" class="sticon  icon-layers"><span>Variants</span></a></li>
                </ul>
            </nav>
            <div class="content-wrap">
                <section style="padding: 1px 2px" id="section-bar-1">
                    <div class="white-box">
                        <div class="form-group">
                            <div class="col-md-8">
                                <label>Tên sản phẩm <span class="help text-danger">*</span></label>
                                <div>
                                    <input type="text" class="form-control" name="name" value="@isset('product','name')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label>SKU <span class="help text-danger">*</span></label>
                                <div>
                                    <input name="sku" type="text" class="form-control" value="@isset('product','sku')">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12">Mô tả sản phẩm <span class="help text-danger">*</span></label>
                            <div class="col-md-12">
                                <textarea id="mymce" name="description">@isset('product','description')</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            price
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-12">Is Sale</label>
                                    <div class="col-md-12">
                                        <input type="checkbox"  name="is_sale" checked class="js-switch"
                                            data-color="#36c6d3" data-size="small" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group m-r-20">
                                        <label>Regular Price <span class="help text-danger">*</span></label>
                                        <div>
                                            <input name="regular_price" type="number" class="form-control" value="@isset('product','regular_price')">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sale Price <span class="help text-danger">*</span></label>
                                        <div>
                                            <input name="sale_price" type="number" class="form-control" value="@isset('product','sale_price')">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Gellery
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="m-t-20 row">
                                        <img src="../plugins/images/img1.jpg"
                                        alt="user" class="col-md-2 col-xs-4">
                                        <img src="../plugins/images/img2.jpg"
                                        alt="user" class="col-md-2 col-xs-4">
                                        <img src="../plugins/images/img3.jpg"
                                        alt="user" class="col-md-2 col-xs-4">
                                    </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include('backend.products.components.attributes')
                @include('backend.products.components.variant')
            </div>
            <!-- /content -->
        </div>
        <!-- /tabs -->
    </section>
    <!-- Tabstyle start -->
</div>
<div class="col-md-3">
    <div class="panel panel-default">
        <div class="panel-heading">Public</div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <button class="btn btn-info waves-effect waves-light" type="submit"><span class="btn-label"><i
                            class="ti-save"></i></span>Save</button>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Status</div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <select name="status" class="selectpicker" data-style="form-control">
                    <option @if(isset($product) && $product->status == 'active') selected @endif value="active">Active</option>
                    <option @if(isset($product) && $product->status == 'hide') selected @endif value="hide">Hidden</option>
                </select>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Categories</div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <select class="selectpicker" name="category_id" data-style="form-control">
                    @foreach ($cates as $item)
                        <option @if (isset($item) && isset($product) && $item->category_id == $product->category_id) selected @endif value="{{$item->category_id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">Thumbnail</div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <img class="img-responsive" src="../plugins/images/assets/studio14.jpg" alt="">
                <input type="hidden" value="1">
            </div>
        </div>
    </div>
</div>
@csrf