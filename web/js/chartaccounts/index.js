function toggleexpand(el)
{
    if ($(el).find('i').hasClass('fa-plus')){
        $(el).find('i').removeClass('fa-plus');
        $(el).find('i').addClass('fa-minus');
        $('#treetable0').treetable('expandAll');
    } else {
        $(el).find('i').removeClass('fa-minus');
        $(el).find('i').addClass('fa-plus');
        $('#treetable0').treetable('collapseAll');
    }
    
}