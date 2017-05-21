<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins and Typeahead) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Typeahead.js Bundle -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <!-- DatePicker.js bundle -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .tt-input,
            .tt-hint {
                width: 396px;
                height: 30px;
                padding: 8px 12px;
                font-size: 24px;
                line-height: 30px;
                border: 2px solid #ccc;
                border-radius: 8px;
                outline: none;
            }

            .tt-input { 
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .tt-hint {
                color: #999;
            }

            .tt-menu { 
                width: 422px;
                margin-top: 12px;
                padding: 8px 0;
                background-color: #fff;
                border: 1px solid #ccc;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 8px;
                box-shadow: 0 5px 10px rgba(0,0,0,.2);
            }

            .tt-suggestion {
                padding: 3px 20px;
                font-size: 18px;
                line-height: 24px;
            }

            .tt-suggestion.tt-cursor {
                color: #fff;
                background-color: #0097cf;

            }

            .tt-suggestion p {
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    GifNotGif
                    <div class="container" style="text-align: center">
                        <form class="form" method="GET" action="{{url('/simulation')}}">
                            <div id="topiccodes" class="form-group">
                                <label>
                                <input name="topiccode1" class="typeahead" type="text" placeholder="Topic Code 1" required>
                                <input name="topiccode2" class="typeahead" type="text" placeholder="(optional)Topic Code 2">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </label>
                            </div>
                            <button type="submit" class="btn">go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('.input-daterange input').each(function() {
                $(this).datepicker({
                    format: 'dd/mm/yyyy'
                });
            });
            var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substringRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $.each(strs, function(i, str) {
                      if (substrRegex.test(str)) {
                        matches.push(str);
                      }
                    });

                cb(matches);
                };
            };

            var topicCodes = ['BACT','DIARY','DRV','FUND','HEDGE','INSI','ISU','NEWS','PRESS','REAM','REG','REGS','RSUM','TOP','WIN','CFIN','CONV','CORA','DIV','EXCA','HOT','IPO','MNGISS','MRG','NEWR','PVE','RCH','RES','RESF','STX','ADV','AER','AIR','APL','AUT','BEV','BIOT','BLD','BNK','BUS','CHE','CON','DPR','DRU','ELC','ELG','ELI','ENQ','ENR','FIN','FOD','GDM','GSFT','HDWR','IND','INS','ISLF','LEI','MAC','MET','MIS','MUL','PUB','REA','REC','RET','RRL','SFWR','SHP','STL','TBCS','TEL','TEX','TIM','WHO','WWW','BBK','BOE','BOJ','CEN','ECB','ECI','EMU','EU','FED','G7','IMF','INT','JOB','MCE','PLCY','PMI','SNB','STIR','TRD','WASH','EUR','FRX','MMT','AAA','AGN','ABS','CDM','CDV','DBT','EQB','EUB','GVD','HYD','IGD','LOA','MTG','MUNI','TNC','USC','COC','COF','COR','COT','GMO','GOL','GRA','LIV','MEAL','OILS','ORJ','PLAS','RUB','SOY','SUG','TEA','USDA','WOO','BIOF','BUN','COA','CO2','CRU','HOIL','JET','LNG','LPG','MOG','NAP','NGS','NSEA','NUC','OPEC','PETC','POLY','PROD','RFO','RNW','AID','BOMB','BKRT','CRIM','DEF','DIP','DIS','EDU','ENT','ENV','FES','FILM','HEA','IMM','JUDIC','LAW','LIF','MUSIC','ODD','POL','PRO','REL','SCI','SECUR','TAX','TRN','VIO','VOTE','WAR','WEA','WTC','AFE','AFF','BAK','EMRG','EUROPE','EEU','ASIA','LATAM','MEAST','WEU','NORD','AMERS','COM','AF','AL','DZ','AS','AD','AO','AI','AQ','AG','AR','AM','AW','AU','AT','AZ','BS','BH','BD','BB','BY','BE','BZ','BJ','BM','BT','BO','BA','BW','BV','BR','IO','VG','BN','BG','BF','BI','KH','CM','CA','CV','KY','CF','TD','CL','CN','CX','CC','CO','KM','CG','CK','CR','HR','CU','CY','CZ','CD','DK','DJ','DM','DO','TP','EC','EG','SV','GBE','GQ','ER','EE','ET','FO','FK','FJ','FI','FR','GF','PF','TF','GA','GM','GG','DE','GH','GI','GR','GL','GD','GP','GU','GT','GN','GW','GY','HT','HM','HN','HK','HU','IS','IN','ID','IR','IQ','IE','IL','IT','CI','JM','JP','JO','KZ','KE','KI','KP','KR','KW','KG','LA','LV','LB','LS','LR','LY','LI','LT','LU','MO','MK','MG','MW','MY','MV','ML','MT','MH','MQ','MR','MU','MX','FM','MJ','MC','MN','MS','MA','MZ','MM','NA','NR','NP','NL','AN','NC','NZ','NI','NE','NG','NU','NF','GBNI','NO','OM','PK','PW','PS','PA','PG','PY','PE','PH','PN','PL','PT','PR','QA','RE','RO','RU','RW','KN','LC','VC','WS','SM','ST','SA','GBS','SN','CS','SC','SL','SG','SK','SQ','SB','SO','ZA','GS','ES','LK','SH','PM','SD','SR','SJ','SZ','SE','CH','SY','TW','TJ','TZ','TH','TG','TK','TO','TT','TN','TR','TM','TC','TV','UG','UA','AE','GB','US','UY','UM','UZ','VU','VA','VE','VN','VI','GBW','WF','EH','YE','ZM','ZW','ALPS','AMER','ARCH','ATHL','AUSR','BADM','BASE','BASK','BIAT','BILL','BOAR','BOBS','BOWL','BOXI','CANO','SOCCL','CHESS','CRIC','CURL','CYCL','DIVE','DOP','ESOC','EQUE','FENC','HOCK','FIGS','FREE','GOLF','GYMN','HAND','HORS','ICEH','JUDO','KARA','LUGE','MODE','MOCR','MORA','MOCY','NBA','NETB','NFL','NHL','SPOR','NORS','OLY','ORIE','RALL','RSLT','ROWI','RUGL','RUGU','SHOO','SKIJ','SNOO','SNO','SOCC','SOFT','SKAT','SKEL','SPEE','SQUA','STSK','SUMO','SWIM','TABT','TAEK','TENN','TENP','TRIA','VOLL','WATP','WATS','WCUP','WEIG','WRES','XCTY','YACH','LBG','LCA','LCS','LDA','LDE','LEN','LEL','LES','LFI','LFR','LIT','LJA','LKO','LNL','LNO','LPL','LPT','LRU','LSK','LSV','LTH','LTR','LZH','AL1','AK1','AZ1','AR1','CA1','CO1','CT1','DE1','DC1','FL1','GA1','GU1','HI1','ID1','IL1','IN1','IA1','KS1','KY1','LA1','ME1','MD1','MA1','MI1','MN1','MS1','MO1','MT1','NC1','ND1','NE1','NV1','NH1','NJ1','NM1','NY1','OH1','OK1','OR1','PA1','PR1','RI1','SC1','SD1','TN1','TX1','UT1','VT1','VA1','VI1','WA1','WV1','WI1','WY1','BINS','BL1','BQ1','CM1','GOS','NG1','NT1','PS1','REVS','SL1','TA1','INV','RTM','ALU','BSD','CAP','CDTY','COS','CPC','CPN','ECON','EQTY','EXC','EXN','FERR','GLC','GLN','INDU','JIJ+','JIK','LEAD','LMET','LTC','LTN','MAN','MIN','MMS','MNEY','MSTA','OLEF','RACK','RBN','PLTN','POTC','SOLV','TEG','TIN','TPO','T01','T02','T03','T04','T05','T06','T07','T08','T09','T10','T11','T12','T13','T14','T15','T16','T17','T18','T19','T20','T21','T22','T23','T24','T25','T26','T27','T28','T29','T30','T31','T32','T33','CDEPTH','CFACT','CINSTA','CINTER','CNEWS','CPOLL','COPINI','FEA','FOR','GEE','GEG','GEM','HOY','INGE','JDOM','JFOR','JLN','JOUR','OTC','MOF','MORG','NOTE','NOW','RJRJ','SWT1','ERR','IDN','HELP','INFO','TIV','XREF','XRNP','XPCO','XPTD','XPSP','XPGE','XDNP','XPCU','XPCM','XPEN','XPMF','XPSC'
            ];

            $('#topiccodes .typeahead').typeahead({
              hint: true,
              highlight: true,
              minLength: 1,
            },
            {
              name: 'topicCodes',
              source: substringMatcher(topicCodes),
              limit: 6,
            });
        </script>
        @yield('content')
    </body>
</html>
