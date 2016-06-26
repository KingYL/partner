/**
 * Created by violetMoon on 2016/6/26.
 */
 
 /*
 
        <li class=""><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">3 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">4 <span class="sr-only">(current)</span></a></li>
        <li class=""><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
		*/
 
function appendPage(curPage, leftPage, jsFuncName, pageUI) {
	curPage = parseInt(curPage);
	leftPage = parseInt(leftPage);
	pageUI.empty();        
	var childs = "<ul class='pagination'>";
	var maxPage = curPage + leftPage;
	var minPage;
	if (curPage < 5)
		minPage = 0;
	else 
		minPage = curPage - 5;
	if (curPage != 0) {
		var destPage = page - 1;
		var pageJs = "javascript:" + jsFuncName + "(" + destPage + ");" + "setParam(\"page\"," + destPage + ")";
		childs += "<li><a href='" + pageJs + "' aria-label='Previous'>" + 
			"<span aria-hidden='true'>&laquo;</span></a></li>";
	}
	for (var page = minPage; page <= maxPage; ++page) {
		var pageJs = "javascript:" + jsFuncName + "(" + page + ");" + "setParam(\"page\"," + page + ")";
		childs += "<li " + (page == curPage? "class='active'": "") + "><a href='" + pageJs + "' aria-label='Previous'>" + (page+1) + "</li>";
	}
	if (leftPage != 0) {
		var destPage = page + 1;
		var pageJs = "javascript:" + jsFuncName + "(" + destPage + ");" + "setParam(\"page\"," + destPage + ")";
		childs += "<li><a href='" + pageJs + "' aria-label='Next'>" + 
			"<span aria-hidden='true'>&raquo;</span></a></li>";
	}
	childs += '</ul>';
	pageUI.append(childs);
}

function getParam(param){
    var query = location.search.substring(1).split('&');
    for(var i=0;i<query.length;i++){
        var kv = query[i].split('=');
        if(kv[0] == param){
            return kv[1];
        }
    }
    return null;
}

function setParam(param, value){
	var newUrl = updateURLParameter(window.location.href, param, value);
	window.history.pushState({},0, newUrl);      
}

function updateURLParameter(url, param, paramVal)
{
    var TheAnchor = null;
    var newAdditionalURL = "";
    var tempArray = url.split("?");
    var baseURL = tempArray[0];
    var additionalURL = tempArray[1];
    var temp = "";

    if (additionalURL) 
    {
        var tmpAnchor = additionalURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor = tmpAnchor[1];
        if(TheAnchor)
            additionalURL = TheParams;

        tempArray = additionalURL.split("&");

        for (i=0; i<tempArray.length; i++)
        {
            if(tempArray[i].split('=')[0] != param)
            {
                newAdditionalURL += temp + tempArray[i];
                temp = "&";
            }
        }        
    }
    else
    {
        var tmpAnchor = baseURL.split("#");
        var TheParams = tmpAnchor[0];
            TheAnchor  = tmpAnchor[1];

        if(TheParams)
            baseURL = TheParams;
    }

    if(TheAnchor)
        paramVal += "#" + TheAnchor;

    var rows_txt = temp + "" + param + "=" + paramVal;
    return baseURL + "?" + newAdditionalURL + rows_txt;
}