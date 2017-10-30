$(function(){
	var table = $('#table'), isMouseDown, selected = [], th
		, tblView = $('.tbl-view'), tblHours = $('.top-hours'), selected = []
	$('#clear-selection').on('click', function(){
		$('.selected').removeClass('selected')
	})
	$('#select-all').on('click', function(){
		$('.selectable').addClass('selected')
	})
	
	$(document).delegate('td.selectable', 'mousedown', function () {
		var th = $(this)
		isMouseDown = true
		th = $(this)
		th.toggleClass("selected").addClass('recent')
		$('td.selectable').removeClass('marker')
		th.html(th.html() == "LIVRE" ? "EM USO" : "LIVRE" );
		th.addClass('marker')
		return false; // prevent text selection
  })
  .delegate('td.selectable', 'mouseover', function () {
		var start_cell, start_y, start_x, end_y, end_x, ind
    if(isMouseDown){
			th = $(this)
			if(!th.hasClass('recent')){
				th.toggleClass("selected").addClass('recent');
				th.html(th.html() == "LIVRE" ? "EM USO" : "LIVRE" );
			}
			start_cell = table.find('td.marker')[0];

			
			// get current row
			var start_y = $.inArray($(start_cell).parent()[0], table.find('tr'));
			var end_y = $.inArray(th.parent()[0], table.find('tr'));

			// get current col
			var start_x = $.inArray(start_cell, $(start_cell).parent().find('td'));
			var end_x = $.inArray(this, th.parent().find('td'));
					
			// switch if end is greater than start
			if (start_y > end_y){
				var temp = end_y;
				end_y = start_y;
				start_y = temp;
			}
					
			if (start_x > end_x){
				var temp = end_x;
				end_x = start_x;
				start_x = temp;
			}
					
			// fill it all in!
			for (y = start_y; y <= end_y; y++){
				for (x = start_x; x <= end_x; x++){
					table.find('tr:eq('+y+')').find('td:eq('+x+')').each(function (i,o) {
						var th = $(this)
						if(th.hasClass('selectable')){
							if(th.hasClass('recent')){} else {
								th.toggleClass("selected").addClass('recent')
								th.html(th.html() == "LIVRE" ? "EM USO" : "LIVRE" );
							}
						}
					});
				}
			}
    }
  })
	.mouseup(function () {
		isMouseDown = false;
		$('td.selectable').removeClass('recent')
	});
  $('td.selectable').bind("selectstart", function () {
    return false; // prevent text selection in IE
  });
	$("#chk_ocioso").change(function(){
		$("#ln_justificativa").fadeToggle();
	});
})
