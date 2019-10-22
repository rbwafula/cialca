jQuery(document).ready(function($){
    'use strict';

    var data = [
        {
            "name": "DRC",
            "path": "M746,-960C765,-922,766,-922,766,-922L776,-909,801,-905,795,-860,802,-850,817,-843,821,-839,822,-829,819,-826,808,-818,793,-791,783,-790,759,-779,753,-774,750,-742,748,-697,751,-695,743,-665,729,-660,722,-657,716,-637,710,-635,707,-628,717,-616,717,-605,718,-582,727,-555,730,-527,739,-503,748,-489,750,-486L757,-486L762,-477,751,-462,750,-447,748,-443,756,-420,766,-407L766,-402L784,-376,783,-372,795,-360,789,-352,720,-348,713,-342,707,-329,700,-312,705,-296,707,-277,708,-259,707,-244,701,-228,694,-220,679,-210,677,-207L677,-203L678,-201,686,-195,699,-183,705,-177,706,-172,710,-170,723,-171,729,-180,742,-184,752,-177,751,-145,750,-127,744,-121,712,-121,707,-126,702,-146,669,-165,641,-170,637,-172,629,-198,625,-194,618,-182,609,-181,605,-185L605,-191L595,-194L553,-194L544,-204,543,-210,509,-210,499,-213,500,-224,496,-228,487,-222L459,-222L437,-221,408,-212,398,-241,399,-253,393,-270,392,-282,378,-297L378,-359L381,-363,377,-382,378,-395,339,-395,323,-410,280,-416,277,-402,277,-397,282,-392,274,-380,260,-380,260,-382L260,-406L252,-406L252,-379,213,-383L213,-386L186,-387,176,-384,157,-390,157,-397,150,-402,146,-427,144,-441,146,-468,119,-458,93,-458,45,-451,13,-456,0,-471,1,-490,5,-496,16,-503,35,-507,50,-508,82,-535,91,-542,91,-550,102,-552,104,-558,115,-563,124,-572,128,-583,128,-605,128,-629,133,-640,154,-651,160,-683,201,-697,203,-713,209,-765,214,-784,215,-824,234,-865,242,-870,247,-885,246,-911,247,-940,259,-950,261,-962,272,-965,287,-967,302,-951,305,-943,316,-938,325,-926,385,-920,389,-917,408,-918,415,-926,417,-954,507,-956,518,-960,534,-975,552,-975,558,-978L620,-978L623,-975,629,-973,635,-970,642,-966,660,-946,715,-945z",
            "value": 4
        },
        {
            "name": "Rwanda",
            "path": "M779,-726C773,-705,774,-686,774,-686L777,-672,778,-656,776,-647,771,-641,759,-636L749,-636L742,-618,741,-602,743,-591,745,-581,746,-569,747,-562,760,-540,860,-541,862,-545,861,-550,876,-563,885,-565,988,-566,992,-581L992,-585L993,-599,994,-618,993,-631,992,-640,989,-650L989,-659L990,-679,991,-689,993,-698,998,-709,998,-735,997,-743,995,-756,954,-779,934,-760,910,-721,889,-722,874,-733,867,-744,842,-745,811,-742,791,-736,779,-731z",
            "value": 5
        },
        {
            "name": "Burundi",
            "path": "M764,-515,796,-514,822,-515,864,-517,875,-521,879,-527,881,-538,907,-539,994,-539,1000,-535,988,-519,978,-515,971,-511,966,-503,964,-493,961,-480,963,-476,969,-472L969,-467L975,-463,990,-454,993,-445,994,-430,992,-422,981,-407,955,-386,953,-373,945,-364L939,-364L933,-360,930,-353,923,-345L917,-345L904,-330,897,-329,896,-316,882,-305,855,-302,833,-302,817,-312,813,-317,817,-374,802,-383,801,-390,778,-431,779,-486,774,-489,771,-493z",
            "value": 2
        }
    ];

    $(function() {
        // Create the chart
        Highcharts.mapChart('container', {
            chart: {
                backgroundColor: 'transparent'
            },
            title: {
              text: null
            },
            subtitle: {
              text: null
            },
            credits: {
                enabled: false
            },
            tooltip: { 
                enabled: false 
            },

            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                      events: {
                            click: function () {
                                $('.vc_grid-filter > li:contains("' + this.name + '")').click();
                            }
                        }
                    }
                }
            },

            series: [
                {
                  name: '',
                  showInLegend: false,
                  joinBy: ['iso-a2','iso'],
                    data: data,
                    states: {
                        hover: {
                            color: '#BADA55'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            ]
        });
    });






});

/*

alert();


*/