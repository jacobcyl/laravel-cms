/**
 * Created by jacob on 2017/1/4.
 */
/**
 * Created by jacobcyl on 2016/8/12 0012.
 * https://github.com/jacobcyl
 */
;(function($, window, document,undefined) {
    //定义ImagePicker的构造函数
    var ImagePicker = function(ele, opt) {
        this.$element = ele,
            this.defaults = {
                url: null,
                multiple: false,//multiple select , default is false
                max: 5,         //max amount of image user can select if multiple is set to true
                callback: null
            },
            this.options = $.extend({}, this.defaults, opt),
            this.version = 'v1.0.0';
        this.page = {
            current_page: 1,
            last_page: 1
        };
        this.selectedId = [];
        this.selectedSrc = [];

        this.initialized = false;
        if(!this.initialized)
            this.init();
    };

    //定义ImagePicker的方法
    ImagePicker.prototype = {
        init: function(){
            this.picker = $(IPGlobal.template);

            this._buildEvents();
            this._attachEvents();
            //this.showMode();
            this.initialized = true;
        },
        //load remote date
        loadData: function (page) {
            if(this.loading)
                return;
            this.loading = true;
            var loader = this.picker.find('.js-loading');
            loader.show();
            if (!this.options.url){
                $.error('[Image Picker] please set url to get remote data');
            }
            var that = this,
                url = this.options.url;
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    page: page
                },
            }).done(function(data){
                that.loading = false;
                loader.hide();
                that.dataSet = data;
                that.update(data);
                console.log(data);
            }).fail(function(jqXHR, textStatus){
                that.loading = false;
                loader.hide();
            });
        },
        _buildEvents: function(){},
        _attachEvents: function(){
            this._initEvents();
        },
        _initEvents: function(){
            $(this.$element).on('click', $.proxy(this.show, this));
            this.picker.find('.page-prev').on('click', $.proxy(this.prev, this));
            this.picker.find('.page-next').on('click', $.proxy(this.next, this));

            this.picker.find('.btn-sure').on('click', $.proxy(this.sure, this));
            this.picker.find('.btn-cancel').on('click', $.proxy(this.cancle, this));

            this.picker.find('#upload').on('change', $.proxy(this.upload, this));

            this.picker.find('.page-go').on('click', $.proxy(this.jump, this));

            this.picker.on('show.bs.modal', $.proxy(this.flush, this));
        },
        update: function(){
            this.fill(this.dataSet);
        },
        fill: function(data){
            if(data === undefined)
                return;

            this.setPaginate(data.current_page, data.last_page);
            this.setImgList(data.data);
        },
        jump: function(){
            var page = this.picker.find('input[id="go-to"]').val();
            if(page > this.page.last_page || page < 1 ){
                this.showTips('请输入正确的页数', 'error')
                return;
            }else if(page == this.page.current_page){
                return;
            }
            this.loadData(page);
        },
        prev: function(){
            var page = this.page.current_page - 1;
            if(page <= 0)
                return;
            this.loadData(page);
        },
        next: function(){
            var page = this.page.current_page + 1;
            if(page > this.page.last_page)
                return;
            this.loadData(page);
        },
        sure: function(){
            if(this.selectedId.length == 0) {
                this.showTips('您还没有选择图片！', 'error');
                return;
            }

            if(this.options.callback)
                this.options.callback(this.$element, this.selectedId, this.selectedSrc);
            this.hide();
            return this.selectedSrc;
        },
        cancel: function(){

        },
        flush: function(){
            this.selectedId = [];
            this.selectedSrc = [];
            this.showTips('请选择图片', 'info');
            this.picker.find('.selected').removeClass('selected');
        },
        select: function(e){
            var item = $(e.currentTarget);
            //item.toggleClass('selected');
            var id = item.data('id'),
                src = item.data('src');

            if(item.hasClass('selected')){
                this.removeItem(item, id, src);
            }else{
                this.addItem(item, id, src);
            }
        },
        addItem: function(item, id, src){
            if(this.options.multiple){
                if(this.selectedId.length >= this.options.max){
                    this.showTips("最多只能选择 " + this.options.max + " 张图片", 'error');
                    return false;
                }
            }else{
                this.picker.find('.selected').removeClass('selected');
                this.selectedId = [];
                this.selectedSrc = [];
            }
            this.selectedId.push(id);
            this.selectedSrc.push(src);

            if(item) item.addClass('selected');

            this.showTips("当前可选 " + (this.options.multiple?this.options.max:1) + " 张 / 已选 "+this.selectedId.length+' 张', 'success');
        },
        removeItem: function(item, id, src){
            if(this.options.multiple){
                index = this.selectedId.indexOf(id);
                this.selectedId.splice(index, 1);
                this.selectedSrc.slice(index, 1);
            }else{
                this.selectedId = [];
                this.selectedSrc = [];
            }
            item.removeClass('selected');
            this.showTips("当前可选 " + (this.options.multiple?this.options.max:1) + " 张 / 已选 "+this.selectedId.length+' 张', 'success');
        },
        showTips: function(msg, msgType){
            this.picker.find('.msg-box').html("<span class='"+msgType+"'>"+msg+"</span>");
        },
        setPaginate: function(curr, total){
            this.page.current_page = curr;
            this.page.last_page = total;

            this.picker.find('.page-prev').toggle(curr != 1);
            this.picker.find('.page-next').toggle(curr != total);

            this.picker.find('.page-num').empty().append(IPGlobal.getPageNum(curr, total));
        },
        setImgList: function(data){
            var container = this.picker.find('.img-list');
            container.empty();
            var that = this;
            $.each(data, function(i, item){
                imgItem = IPGlobal.getImgItem(item);
                imgItemInner = imgItem.find('.img-item-bd');

                var id = imgItemInner.data('id'),
                    src = imgItemInner.data('src');

                if(that.selectedId.indexOf(id) >= 0) imgItemInner.addClass('selected');

                imgItemInner.on('click', $.proxy(that.select, that));
                container.append(imgItem);
            });
        },
        show: function(){
            this.picker.modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
            if(this.picker.find('.img-list div').length == 0){
                this.loadData(this.current_page);
            }
        },
        hide: function(){
            this.picker.modal('hide');
        },
        upload: function(e){
            if(typeof lrz === 'undefined')
                $.error('This plugin require lrz compressor module, see(https://github.com/think2011/localResizeIMG)');
            var uploadField = e.target;
            if (uploadField.files.length === 0) return;

            var progressBar = this.picker.find('.upload_progress_bar');
            var progress = this.picker.find('.js_progress');
            progress.css({width: 0});

            var that = this;

            lrz(uploadField.files[0], {
                width: 800 //图片最大宽度为800
                //quality: 0.9
            })
                .then(function(rst) {
                    progressBar.show();
                    //上传
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/dashboard/media/upload/image/assets',
                        //dataType: 'script',
                        data: rst.formData,
                        processData: false,
                        contentType: false,
                        type: 'POST',
                        cache: false,
                        xhr: function(){
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt){
                                if (evt.lengthComputable) {
                                    var percentComplete = evt.loaded / evt.total;
                                    //Do something with upload progress
                                    progress.animate({
                                        width: percentComplete * 100 + '%'
                                    }, 300);
                                }
                            }, false);

                            return xhr;
                        },
                        complete:function(){
                            progressBar.hide();
                        },
                        success: function(data){
                            that.addItem(null, data.id, data.url);
                            that.loadData(1);
                        },
                        error: function(jqXHR, textStatus, errorThrown ){
                            progressBar.hide();
                            if (jqXHR.status == 422){
                                that.showTips('文件上传失败，文件大于1M或格式不符', 'error');
                            }else{
                                that.showTips('上传文件失败', 'error');
                            }
                        }
                    });
                })
                .catch(function (err) {
                    that.showTips(err, 'error');
                })
                .always(function () {
                    // 不管是成功失败，都会执行
                });
        }
    };
    var IPGlobal = {
        getPageNum: function(curr, total){
            var pageNum = $(this.pageNumTemplate);
            pageNum.first().text(curr);
            pageNum.last().text(total);
            return pageNum;
        },
        getImgItem: function(item){
            var imgItem = $(this.imgItemTemplate);
            imgItem.find('.img-item-bd').attr({
                'data-id': item.id,
                'data-src': item.url
            });
            imgItem.find('img').attr({
                src: item.thumb,
                alt: item.origin_name
            });
            imgItem.find('.lbl-content').text(item.origin_name);
            return imgItem;
        },
        headTemplate:       '<div class="modal-header">'+
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
        '<h4 class="modal-title">选择图片</h4>'+
        '</div>',

        footTemplate:       '<div class="modal-footer">'+
        '<div class="msg-box"></div>'+
        '<button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">取消</button>'+
        '<button type="button" class="btn btn-primary btn-sure">确定</button>'+
        '</div>',
        uploadAreaTemplate: '<div class="img-upload-area">'+
        '<div class="btn btn-success btn-file pull-right">'+
        '<i class="glyphicon glyphicon-picture"></i>'+
        '<span class="hidden-xs">本地上传</span>'+
        '<input type="file" accept="image/*" id="upload">'+
        '</div>'+
        '<p class="help-block pull-right help-inline-block">图片大小不超过5M</p>'+
        '</div>'+
        '<div class="upload_progress_bar">'+
        '<div class="progress_inner_bar js_progress"></div>'+
        '</div>',
        //folderTemplate:     '<a href="#" class="list-group-item"></a>',
        imgListTemplate:    '<div><div class="img-list-container">'+
        '<i class="icon-loading-small white js-loading"></i>'+
        '<div class="row img-list" id="img-list"></div>'+
        '</div></div>',
        pageNumTemplate:    '<label>0</label>'+
        '<span class="num-gap"> / </span>'+
        '<label>0</label>',
        paginateTemplate:   '<div class="js-pagebar">'+
        '<div class="pagination">'+
        '<span class="page-nav-area">'+
        '<a href="javascript:void(0);" class="btn btn-default page-prev" style="display: inline-block">'+
        '<i class="arrow"></i>'+
        '</a>'+
        '<span class="page-num">'+
        '</span>'+
        '<a href="javascript:void(0);" class="btn btn-default page-next" style="display: inline-block">'+
        '<i class="arrow"></i>'+
        '</a>'+
        '</span>'+
        '<span class="goto-area">'+
        '<input type="text" id="go-to">'+
        '<a href="javascript:void(0);" class="btn btn-default page-go">跳转</a>'+
        '</span>'+
        '</div>'+
        '</div>',
        imgItemTemplate:    '<div class="col-xs-6 col-md-3 img-item" data-id="" data-url="">'+
        '<div class="thumbnail img-item-bd" title="">'+
        '<div class="scale w-5-3-h"><img class="scale-box" src="#" alt="{{ $media->origin_name }}" style="object-fit: cover"></div>'+
        '<div class="caption item-label">'+
        '<h6 class="lbl-content"></h6>'+
        '</div>'+
        '<div class="selected-mask">'+
        '<div class="selected-mask-inner"></div>'+
        '<div class="selected-mask-icon"></div>'+
        '</div>'+
        '</div>'+
        '</div>'
    };
    IPGlobal.bodyTemplate='<div class="modal-body">'+
        '<div class="container-fluid">'+
        '<div class="row">'+
        '<div class="col-md-12">'+
        '<div class="img-pick-area">'+
        IPGlobal.uploadAreaTemplate+
        IPGlobal.imgListTemplate+
        IPGlobal.paginateTemplate+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>'+
        '</div>';

    IPGlobal.template = '<div class="modal fade image-picker" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">'+
        '<div class="modal-dialog modal-lg">'+
        '<div class="modal-content">'+
        IPGlobal.headTemplate+
        IPGlobal.bodyTemplate+
        IPGlobal.footTemplate+
        '</div>'+
        '</div>'+
        '</div>';


    $.fn.imagepicker = function(options) {
        this.each(function() {
            if (!$.data(this, 'plugin_imagepicker')) {
                $.data(this, 'plugin_imagepicker', new ImagePicker(this, options));
            }
        });

        // chain jQuery functions
        return this;
    };

    $.fn.imagepicker.IPGlobal = IPGlobal;
    window.ImagePicker = ImagePicker;
})(jQuery, window, document);