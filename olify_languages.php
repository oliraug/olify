<?php
//stock_product.php

include('config.php');
include('function.php');

/*if(!isset($_SESSION['type']))
{
	header('location:login.php');
}

if($_SESSION['type'] != 'master')
{
	header("location:index.php");
}*/

include('header.php');

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Language List</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<span id="alert_action"></span>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                        <div class="row">
                            <h3 class="panel-title"></h3>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                        <div class="row" align="right">
                             <button type="button" name="add" id="add_button" data-toggle="modal" data-target="#languageModal" class="btn btn-success btn-xs">Add Language</button>   		
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="panel-body">
                    <div class="row">
                    	<div class="col-sm-12 table-responsive" ng-controller="LanguageController">
                    		<table border="1" class="table table-bordered table-striped table-hover table-checkable datatable" datatable="ng" ng-init="getLanguages()">                        
                    			<thead><tr>
									         <th>Language ID</th>
                           <th>Market Name</th>
									         <th>Language Name</th>
									         <th>Language Code</th>
                           <th>Created Date</th>
                           <th>Status</th>
									         <th>View</th>
									         <th>Edit</th>
									         <th>Delete</th>
								          </tr></thead>
								        <tr ng-repeat="data in languages track by $index">
									         <td>{{$index+1}}</td>
                           <td>{{data.market_name}}</td>
									         <td>{{data.lang_name}}</td>
									         <td>{{data.lang_code}}</td>
                           <td>{{data.created}}</td>
                           <td>{{data.lang_status}}</td>
									         <td>
                            	<div class="btn-group">
                              	<button type="button" class="btn btn-info btn-xs" title="View" ng-click="view($index);"><li class="glyphicon glyphicon-open"></li></button>
                           		</div>
                            </td>
                            <td>
                            	<div class="btn-group">
                                <button type="button" class="btn btn-warning btn-xs" title="Edit" ng-click="editLanguage($index);"><li class="glyphicon glyphicon-pencil"></li></button>
                            		<!--Buttons for editing -->
                            			<button class="green" ng-click="saveEdit($index)">save</button>
                            			<button class="red" ng-click="cancelEdit()">X</button>
                            			</div>
                            </td>
                            <td>
                              <div class="btn-group">
                             			<button type="button" class="btn btn-danger btn-xs" title="Delete" ng-click="deleteLanguage($index);"><li class="glyphicon glyphicon-trash"></li></button>
                            			</div>
                            </td>
								            </tr>
                    		</table>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="languageModal" class="modal fade">
    	<div class="modal-dialog">
    		<form id="language_form" ng-submit="newLanguage()" name="languageForm" ng-controller="LanguageController" class="well form-horizontal">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Langauge</h4>
    				</div>
    				<div class="modal-body">
              <div class="form-group">
                <label class="col-md-4 control-label" for="market">Select Market Name</label>
                <div class="col-md-4 selectContainer">
                <div class="input-group">
                <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                <select id="market_id" name="text" class="form-control selectpicker" ng-model="language.market_id" style="width: 15em;height: 4em;">
                <option value="">Select Market</option>
                <?php echo fill_market_list($con); ?>
                </select>
                </div>
                </div>
              </div>
    				<div class="form-group">
                <label class="col-md-4 control-label" for="product">Select Language</label>
                  <div class="col-md-4 selectContainer">
                  <div class="input-group">
                  <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                  <select id="name" name="text" class="form-control select2 language-search" data-action="LanguageChange" ng-model="language.lang_name" required style="width:15em;height:4em;">
                  <option value="">Select Language</option>
                  <option value="Abkhazian">Abkhazian</option><option value="Afar">Afar</option>
									<option value="Afrikaans">Afrikaans</option><option value="Albanian">Albanian</option>
									<option value="Amharic">Amharic</option><option value="Arabic">Arabic</option>
									<option value="Aragonese">Aragonese</option><option value="Armenian">Armenian</option>
									<option value="Arabic">Arabic</option><option value="Assamese">Assamese</option>
									<option value="Avestan">Avestan</option><option value="Aymara">Aymara</option>
									<option value="Azerbaijani">Azerbaijani</option><option value="Bashkir">Bashkir</option>
									<option value="Basque">Basque</option><option value="Belarusian">Belarusian</option>
									<option value="Bengali">Bengali</option><option value="Bihari">Bihari</option>
									<option value="Bislama">Bislama</option><option value="Bosnian">Bosnian</option>
									<option value="Breton">Breton</option><option value="Bulgarian">Bulgarian</option>
									<option value="Burmese">Burmese</option><option value="Catalan">Catalan</option>
									<option value="Chamorro">Chamorro</option><option value="Chechen">Chechen</option>
									<option value="Chinese">Chinese</option><option value="Church Slavic; Slavonic; Old Bulgarian">Church Slavic; Slavonic; Old Bulgarian</option>
									<option value="Chuvash">Chuvash</option><option value="Cornish">Cornish</option>
									<option value="Corsican">Corsican</option><option value="Croatian">Croatian</option>
									<option value="Czech">Czech</option><option value="Danish">Danish</option>
									<option value="Divehi; Dhivehi; Maldivian">Divehi; Dhivehi; Maldivian</option><option value="Dutch">Dutch</option>
									<option value="Dzongkha">Dzongkha</option><option value="English">English</option>
									<option value="Esperanto">Esperanto</option><option value="Estonian">Estonian</option>
									<option value="Faroese">Faroese</option><option value="Fijian">Fijian</option>
									<option value="Finnish">Finnish</option><option value="French">French</option>
									<option value="Gaelic; Scottish Gaelic">Gaelic; Scottish Gaelic</option><option value="Galician">Galician</option>
									<option value="Georgian">Georgian</option><option value="German">German</option>
									<option value="Greek, Modern (1453-)">Greek, Modern (1453-)</option><option value="Guarani">Guarani</option>
									<option value="Gujarati">Gujarati</option><option value="Haitian; Haitian Creole">Haitian; Haitian Creole</option>
									<option value="Hausa">Hausa</option><option value="Hebrew">Hebrew</option>
									<option value="Herero">Herero</option><option value="Hindi">Hindi</option>
									<option value="Hiri Motu">Hiri Motu</option><option value="Hungarian">Hungarian</option>
									<option value="Icelandic">Icelandic</option><option value="Ido">Ido</option>
									<option value="Indonesian">Indonesian</option><option value="Interlingua">Interlingua</option>
									<option value="Interlingue">Interlingue</option><option value="Inuktitut">Inuktitut</option>
									<option value="Inupiaq">Inupiaq</option><option value="Irish">Irish</option>
									<option value="Italian">Italian</option><option value="Japanese">Japanese</option>
									<option value="Javanese">Javanese</option><option value="Kalaallisut">Kalaallisut</option>
									<option value="Kannada">Kannada</option><option value="Kashmiri">Kashmiri</option>
									<option value="Kazakh">Kazakh</option><option value="Khmer">Khmer</option>
									<option value="Kikuyu; Gikuyu">Kikuyu; Gikuyu</option><option value="Kinyarwanda">Kinyarwanda</option>
									<option value="Kirghiz">Kirghiz</option><option value="Komi">Komi</option>
									<option value="Korean">Korean</option><option value="Kuanyama; Kwanyama">Kuanyama; Kwanyama</option>
									<option value="Kurdish">Kurdish</option><option value="Lao">Lao</option>
									<option value="Latin">Latin</option><option value="Latvian">Latvian</option>
									<option value="Limburgan; Limburger; Limburgish">Limburgan; Limburger; Limburgish</option><option value="Lingala">Lingala</option>
									<option value="Lithuanian">Lithuanian</option><option value="Luxembourgish; Letzeburgesch">Luxembourgish; Letzeburgesch</option>
									<option value="Macedonian">Macedonian</option><option value="Malagasy">Malagasy</option>
									<option value="Malay">Malay</option><option value="Malayalam">Malayalam</option>
									<option value="Maltese">Maltese</option><option value="Manx">Manx</option>
									<option value="Maori">Maori</option><option value="Marathi">Marathi</option>
									<option value="Marshallese">Marshallese</option><option value="Moldavian">Moldavian</option>
									<option value="Mongolian">Mongolian</option><option value="Nauru">Nauru</option>
									<option value="Navaho, Navajo">Navaho, Navajo</option><option value="Ndebele, North">Ndebele, North</option>
									<option value="Ndebele, South">Ndebele, South</option><option value="Ndonga">Ndonga</option>
									<option value="Nepali">Nepali</option><option value="Northern Sami">Northern Sami</option>
									<option value="Norwegian">Norwegian</option><option value="Sanskrit">Sanskrit</option>
									<option value="Sardinian">Sardinian</option><option value="Serbian">Serbian</option>
									<option value="Shona">Shona</option><option value="Sichuan Yi">Sichuan Yi</option>
									<option value="Sindhi">Sindhi</option><option value="Sinhala; Sinhalese">Sinhala; Sinhalese</option>
									<option value="Slovak">Slovak</option><option value="Slovenian">Slovenian</option>
									<option value="Somali">Somali</option><option value="Sotho, Southern">Sotho, Southern</option>
									<option value="Spanish; Castilian">Spanish; Castilian</option><option value="Sundanese">Sundanese</option>
									<option value="Swahili">Swahili</option><option value="Swati">Swati</option>
									<option value="Swedish">Swedish</option><option value="Tagalog">Tagalog</option>
									<option value="Tahitian">Tahitian</option><option value="Tajik">Tajik</option>
									<option value="Tamil">Tamil</option><option value="Tatar">Tatar</option>
									<option value="Telugu">Telugu</option><option value="Thai">Thai</option>
									<option value="Tibetan">Tibetan</option><option value="Tigrinya">Tigrinya</option>
									<option value="Tonga ">Tonga </option><option value="Tsonga">Tsonga</option>
									<option value="Tswana">Tswana</option><option value="Turkish">Turkish</option>
									<option value="Turkmen">Turkmen</option><option value="Twi">Twi</option>
									<option value="Uighur">Uighur</option><option value="Ukrainian">Ukrainian</option>
									<option value="Urdu">Urdu</option><option value="Uzbek">Uzbek</option>
									<option value="Vietnamese">Vietnamese</option><option value="Volapuk">Volapuk</option>
									<option value="Walloon">Walloon</option><option value="Welsh">Welsh</option>
									<option value="Western Frisian">Western Frisian</option><option value="Wolof">Wolof</option>
									<option value="Xhosa">Xhosa</option><option value="Yiddish">Yiddish</option>
									<option value="Yoruba">Yoruba</option><option value="Zhuang; Chuang">Zhuang; Chuang</option>
									<option value="Zulu">Zulu</option>
									</select>
                  </div>
                  </div>
                  </div>
    				      <div class="form-group">
                        <label class="col-md-4 control-label" for="product">Select Code</label>
                        <div class="col-md-4 selectContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                        <select id="code" name="text" class="form-control selectpicker" ng-model="language.lang_code" required style="width:15em;height:4em;">
                        <option value="">Select language Code</option>
                        <option value="aa">aa</option><option value="ab">ab</option>
                        <option value="af">af</option><option value="sq">sq</option>
                        <option value="am">am</option><option value="ar">ar</option>
                        <option value="an">an</option><option value="hy">hy</option>
                        <option value="as">as</option><option value="ae">ae</option>
                        <option value="ay">ay</option><option value="az">az</option>
                        <option value="ba">ba</option><option value="eu">eu</option>
                        <option value="be">be</option><option value="bn">bn</option>
                        <option value="bh">bh</option><option value="bi">bi</option>
                        <option value="bs">bs</option><option value="br">br</option>
                        <option value="bg">bg</option><option value="my">my</option>
                        <option value="ca">ca</option><option value="ch">ch</option>
                        <option value="ce">ce</option><option value="zh">zh</option>
                        <option value="cu">cu</option><option value="cv">cv</option>
                        <option value="kw">kw</option><option value="co">co</option>
                        <option value="hr">hr</option><option value="cs">cs</option>
                        <option value="da">da</option><option value="dv">dv</option>
                        <option value="nl">nl</option><option value="dz">dz</option>
                        <option value="en">en</option><option value="eo">eo</option>
                        <option value="et">et</option><option value="fo">fo</option>
                        <option value="fj">fj</option><option value="fi">fi</option>
                        <option value="fr">fr</option><option value="gd">gd</option>
                        <option value="gl">gl</option><option value="ka">ka</option>
                        <option value="de">de</option><option value="el">el</option>
                        <option value="gn">gn</option><option value="gu">gu</option>
                        <option value="ht">ht</option><option value="ha">ha</option>
                        <option value="he">he</option><option value="hz">hz</option>
                        <option value="hi">hi</option><option value="ho">ho</option>
                        <option value="hu">hu</option><option value="is">is</option>
                        <option value="io">io</option><option value="id">id</option>
                        <option value="ia">ia</option><option value="ie">ie</option>
                        <option value="iu">iu</option><option value="ik">ik</option>
                        <option value="ga">ga</option><option value="it">it</option>
                        <option value="ja">ja</option><option value="jv">jv</option>
                        <option value="kl">kl</option><option value="kn">kn</option>
                        <option value="ks">ks</option><option value="kk">kk</option>
                        <option value="km">km</option><option value="ki">ki</option>
                        <option value="rw">rw</option><option value="ky">ky</option>
                        <option value="kv">kv</option><option value="ko">ko</option>
                        <option value="kj">kj</option><option value="ku">ku</option>
                        <option value="lo">lo</option><option value="la">la</option>
                        <option value="lv">lv</option><option value="li">li</option>
                        <option value="ln">ln</option><option value="lt">lt</option>
                        <option value="lb">lb</option><option value="mk">mk</option>
                        <option value="mg">mg</option><option value="ms">ms</option>
                        <option value="ml">ml</option><option value="mt">mt</option>
                        <option value="gv">gv</option><option value="mi">mi</option>
                        <option value="mr">mr</option><option value="mh">mh</option>
                        <option value="mo">mo</option><option value="mn">mn</option>
                        <option value="na">na</option><option value="nv">nv</option>
                        <option value="nd">nd</option><option value="nr">nr</option>
                        <option value="ng">ng</option><option value="ne">ne</option>
                        <option value="se">se</option><option value="no">no</option>
                        <option value="nb">nb</option><option value="nn">nn</option>
                        <option value="ny">ny</option><option value="oc">oc</option>
                        <option value="or">or</option><option value="om">om</option>
                        <option value="os">os</option><option value="pi">pi</option>
                        <option value="pa">pa</option><option value="fa">fa</option>
                        <option value="pl">pl</option><option value="pt">pt</option>
                        <option value="ps">ps</option><option value="qu">qu</option>
                        <option value="rm">rm</option><option value="ro">ro</option>
                        <option value="rn">rn</option><option value="ru">ru</option>
                        <option value="sm">sm</option><option value="sg">sg</option>
                        <option value="sa">sa</option><option value="sc">sc</option>
                        <option value="sr">sr</option><option value="sn">sn</option>
                        <option value="ii">ii</option><option value="sd">sd</option>
                        <option value="si">si</option><option value="sk">sk</option>
                        <option value="sl">sl</option><option value="so">so</option>
                        <option value="st">st</option><option value="es">es</option>
                        <option value="su">su</option><option value="sw">sw</option>
                        <option value="ss">ss</option><option value="sv">sv</option>
                        <option value="tl">tl</option><option value="ty">ty</option>
                        <option value="tg">tg</option><option value="ta">ta</option>
                        <option value="tt">tt</option><option value="te">te</option>
                        <option value="th">th</option><option value="bo">bo</option>
                        <option value="ti">ti</option><option value="to">to</option>
                        <option value="ts">ts</option><option value="tn">tn</option>
                        <option value="tr">tr</option><option value="tk">tk</option>
                        <option value="tw">tw</option><option value="ug">ug</option>
                        <option value="uk">uk</option><option value="ur">ur</option>
                        <option value="uz">uz</option><option value="vi">vi</option>
                        <option value="vo">vo</option><option value="wa">wa</option>
                        <option value="cy">cy</option><option value="fy">fy</option>
                        <option value="wo">wo</option><option value="xh">xh</option>
                        <option value="yi">yi</option><option value="yo">yo</option>
                        <option value="za">za</option><option value="zu">zu</option>
                        </select>
                        </div>
                     </div>
                   </div>
                   <!--div class="form-group">
                        <label class="col-md-4 control-label" for="lang_name">Select Language Name</label>
                        <div class="col-md-4 selectContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                        <select id="lang_name" name="text" class="form-control selectpicker" ng-model="language.lang_name" required style="width:15em;height:4em;" ng-options="name.label for name in languageNames">
                        <!--option value="">Select language Name</option>
                        <option value="aa">aa</option>
                        <!--option value="ab">ab</option>
                        <option value="af">af</option>
                        <option value="sq">sq</option>
                        <option value="am">am</option>
                        <option value="ar">ar</option->
                        </select>
                        </div>
                     </div>
                   </div>
                   <div class="form-group">
                        <label class="col-md-4 control-label" for="lang_code">Select Language Code</label>
                        <div class="col-md-4 selectContainer">
                        <div class="input-group">
                        <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                        <select id="lang_code" name="text" class="form-control selectpicker" ng-model="language.lang_code" required style="width:15em;height:4em;" ng-options="code.label for code in languageCodes | filter:{name:lang_name.data}">
                        <!--option value="">Select language Code</option>
                        <option value="aa">aa</option>
                        <!--option value="ab">ab</option>
                        <option value="af">af</option>
                        <option value="sq">sq</option>
                        <option value="am">am</option>
                        <option value="ar">ar</option->
                        </select>
                        </div>
                     </div>
                   </div-->
                   <div class="form-group">
                                <label class="col-md-4 control-label" for="amount">Created Date</label>
                                <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                <input type="date" name="created" id="created" class="form-control" ng-model="language.created" style="width: 15em;height: 2.5em;"/>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-4 control-label">Language Status</label>
                                <div class="col-md-4 selectContainer">
                                <div class="input-group">
                                <span class="input-group-addon"><li class="glyphicon glyphicon-list"></li></span>
                                  <select name="text" id="status"  class="form-control selectpicker" ng-model="language.lang_status" required="required" style="width: 15em;height: 2.5em;">
                                    <option value="">Select</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                  </select>
                                  </div>
                                </div>
                            </div>
               </div>
    				<div class="modal-footer">
    					<input type="hidden" name="lang_id" id="lang_id"/>
    					<input type="hidden" name="btn_action" id="btn_action"/>
    					<input type="submit" name="action" id="action" class="btn btn-info" value="Add" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
<!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-sm-none d-md-block" style="color:red;font-size: 1em;">
      Exposing farmers to markets|Educating the world
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="https://www.olify.com">Olify Inc</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS ->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- SparkLine -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jVectorMap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.2 -->
<script src="plugins/chartjs-old/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>