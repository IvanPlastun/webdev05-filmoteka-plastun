$(document).ready(function() {
	
	$(".left-panel").customScrollbar({preventDefaultScroll: true});

	// Upload file. Кнопка загрузки фотографии
    $('.inputfile').change(function() {
        var label = $(this).parent().find('span');
        var files = $(this)[0].files;
        if(files.length >= 2){
            label.text("Вы выбрали " + this.files.length + " файла");
        }  else {
            label.text($(this).val().replace('C:\\fakepath\\',''));
        }  
    });


// initMap() - функция инициализации карты
function initMap() {

    // Координаты центра на карте. Широта: 56.2928515, Долгота: 43.7866641
    // var centerLatLng = new google.maps.LatLng(55.751227, 37.622932);
    var moscow = {lat:55.684207, lng:37.888492};
    
    // Создаем карту внутри элемента #map
    var myMap = new google.maps.Map(document.getElementById("map"), {
        center: moscow,
        zoom: 13,
        disableDefaultUI: true,
            styles: [
                        {
                            "featureType": "administrative",
                            "elementType": "labels.text.fill",
                            "stylers": [
                                {
                                    "color": "#444444"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#f2f2f2"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 45
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels.icon",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "color": "#46bcec"
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        }
                    ]
    });

    // Описание маркера на карте
    var markerMoscow = new google.maps.Marker ({
        position: moscow,
        map: myMap,
        title: 'Где-то здесь живет Юрий Ключевский',
        icon: 'img/point.png'
    });

    // Задаем инфу для окна
    var contentString = '<div class="infowindow">' +
                            '<h3>Москва, Люберцы</h3>' +
                            '<p>Штаб-квартира WebCademy</p>' +
                        '</div>';

    // Создаем объект информационного окна и помещаем его в переменную infoWindow
    var infoWindow = new google.maps.InfoWindow({
        content: contentString
    });

    markerMoscow.addListener("click", function() {
        // infoWindow.open - показывает информационное окно.
        // Параметр map - это переменная содержащие объект карты (объявлена ранее)
        // Параметр marker - это переменная содержащие объект маркера (объявлена ранее)
        infoWindow.open(myMap, markerMoscow);
    });
}

// Запуск карты
initMap();
// Ждем полной загрузки страницы, после этого запускаем initMap()
// google.maps.event.addDomListener(window, "load", initMap);

});