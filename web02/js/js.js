// JavaScript Document
function lo(th, url) {
	$.ajax(url, { cache: false, success: function (x) { $(th).html(x) } })
}

function lof(url) {
	location.href = url;
}

function del(table) {
	let dels = $('input[name="del[]"]:checked');
	let ids = [];

	dels.each((idx, e) => {
		ids.push($(e).val());
	});

	$.post(`./api/del.php?do=${table}`, { ids: ids }, function (res) {
		location.reload();
	})
}

function resetChk() {
	$("input[type='checkbox']").prop("checked", false);
}

function resetForm() {
	$("#acc").val("");
	$("#pw").val("");
	$("#pw2").val("");
	$("#email").val("");
}