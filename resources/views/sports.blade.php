@extends('layouts.app')

@section('content')
@if($agent->isMobile())
	<script type="text/javascript" src="https://msports-itainment-uat.biahosted.com/staticResources/betinactionApi.js"></script>
@else 
	<script type="text/javascript" src="https://sports-itainment-uat.biahosted.com/staticResources/betinactionApi.js"></script>
@endif
    <section class="content">
        <div class="container-fluid">
            <div class="row">
			<div id="SetPageButtons">
        <button onClick="betinactionAPI.setPagePrelive()">Prelive</button>
		@if(!$agent->isMobile())
        <button onClick="betinactionAPI.setPageLive()">Live</button>
		@endif
        <button onClick="betinactionAPI.setPageVfl()">Vfl</button>
    </div>

                <div class="content__games1 clearfix1" style="height:auto !important;">
                     <div id="BIA_client_container"></div>
                </div>
            </div>
        </div>
    </section>
	
	<script>
	 function getSelectionsList() {
            var eventIds = String(document.getElementById("InputeventId").value).split(',');
            betinactionAPI.getMarkets(eventIds);
        }
        
        function onSelectionButtonClick(btn) {
            betinactionAPI.setSelection(btn.dataset.selectionid);
        }

	var parseQuery = function (queryString) {
      if (((typeof queryString) !== 'string') || (queryString.length === 0)) {
        return {}
      }
      var leadingSymbols = ['?', '#']
      if (leadingSymbols.indexOf(queryString[0]) > -1) {
        queryString = queryString.substr(1)
      } else {
        return {}
      }
      queryString = queryString.replace(/[\]]/g, '\\$&')
      var params = {}
      var queryParts = decodeURI(encodeURI(queryString)).split(/&/g)
      for (var a = queryParts, i = 0, ii = a.length; i < ii; i++) {
        var val = a[i]
        var parts = val.split('=')
        if ((parts.length >= 1) && (parts[0] !== '')) {
          var key = null
          if (parts.length === 2) {
            key = parts[1]
          }
          params[parts[0]] = key
        }
      }
      return params
    }

	
	var biaOptions = parseQuery(window.location.hash);
		biaOptions.walletcode  = "739562";
		biaOptions.token  = "{{ $player_token }}";
		biaOptions.page = 'prelive';
        biaOptions.getMarketsCallback = function (result) {
            if(result.length !== 0){
            var resultString = JSON.stringify(result);
            var htmlString = '';
            for (var eventIdx = 0; eventIdx < result.length; eventIdx++) {
                var event = result[eventIdx];
                htmlString += '<br><h3>'+event['EventName'] + '</h3>';
                var markets = event['Markets'];
                for (var marketIdx = 0; marketIdx < markets.length; marketIdx++) {
                    var market = markets[marketIdx];
                    htmlString += '<h4>' + market['Name'] + '</h4><table>';
                    var selectionList = market['SelectionList'];
                    for (var selectionIdx = 0; selectionIdx < selectionList.length; selectionIdx++) {
                        var selection = selectionList[selectionIdx];
                        htmlString += '<tr><td style="padding-right: 7px;">' + selection['SelectionName'] + ':</td> <td style="text-align: right;"><b>' + selection['Price'] + '</b></td> <td><button id="addSelectionIdBtn" onclick = "onSelectionButtonClick(this)" data-selectionId = "' + selection['SelectionId'] + '">Set</button></td></tr>';
                    }
                }
                htmlString += '</table>';
            }
        
            document.getElementById('SelectionsList').innerHTML =  htmlString;
            }
            
        };
      
        biaOptions.setSelectionCallback = function () {
            document.getElementById('SelectionResult').innerHTML = 'Added to betslip';
        };
        biaOptions.loadCallback = function () {
            if (betinactionAPI.initParams.full) {
                document.getElementById("SetPageButtons").style.display = "block";
                document.getElementById("SelectionIdForm").style.display = "none";
            }
            else {
                document.getElementById("SetPageButtons").style.display = "none";
            }
        };
        biaOptions.insufficientBalanceCallback = function () {
            alert('Insufficient Balance')
        };
        biaOptions.intervalDelay = 100;
        biaOptions.hashchangeCallback = function (hash) {
            history.pushState(undefined, undefined, hash || '#');
        };
		biaOptions.logoffCallback = function(logoffData){
			console.log(logoffData);
		};
        
        var betinactionAPI = new BetinactionAPI("#BIA_client_container", biaOptions);
 
	
	</script>
@endsection
