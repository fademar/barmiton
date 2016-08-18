$(document).ready(function() {


	// var ias = $.ias({
	// 	container:  "#cocktails",
	// 	item:       ".item",
	// 	pagination: "#pagination",
	// 	next:       ".next a"
	// });

	// ias.extension(new IASSpinnerExtension());            // shows a spinner (a.k.a. loader)
	// ias.extension(new IASTriggerExtension({offset: 1})); // shows a trigger after page 3
	// ias.extension(new IASNoneLeftExtension({
	//   text: 'There are no more pages left to load.'      // override text when no pages left
	// }));


	$('.sortable').bootstrapSortable;

}); // Fin Document Ready