jQuery.noConflict();
jQuery(function($)
{
	if($('#imageGallerytLister').length)
	{
            $('#imageGallerytLister a').lightBox({
                imageLoading: 'assetlister/images/lightbox-ico-loading.gif',
                imageBtnClose: 'assetlister/images/lightbox-btn-close.gif',
                imageBtnPrev: 'assetlister/images/lightbox-btn-prev.gif',
                imageBtnNext: 'assetlister/images/lightbox-btn-next.gif'
            });	
	}	
});