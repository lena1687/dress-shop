"use strict";

$(document).ready(function() {

    //просмотр фото
    $(".slider-item a").fancybox();

	//слайдер особенности
	$('.feature-carousel').owlCarousel({
		items:1,
		dots: true,
		margin: 0,
		center:true,
		loop:true,
		autoplay:true,
		autoplayTimeout:3000,
		animateOut: 'fadeOut'
	});

	//доставка
		$('.anchor').click(function (event) {
			event.preventDefault();
			var $this = $(this);
			if (!$this.parent().hasClass('active')) {
				$this.parent().addClass('active');
				$('.anchor').not(this).parent().removeClass('active');
			}
		});

	//контакты
		$(this).scroll(function () {
			var currentScroll = $(this).scrollTop() + $(window).height();
			var wrapper = $('.communication-block');
			if(currentScroll >= wrapper.offset().top + (wrapper.height() / 4)) {
				$('#address-tel').addClass('address-left');
				$('#contacts-form').addClass('contacts-right');
			}
		});


    //форма обратной связи
    $(this).scroll(function () {
        var currentScroll = $(this).scrollTop() + $(window).height();
        var wrapper = $('.feedback');
        if(currentScroll >= wrapper.offset().top + (wrapper.height() / 4)) {
            $('#feedback-text-left').addClass('feedback-left');
            $('#feedback-form-right').addClass('feedback-right');
        }
    });

	//слайдер отзывов
	$('.rewiew-carousel').owlCarousel({
		items:1,
		touchDrag: true,
		dots: true,
		margin: 0,
		center:true,
		autoplayTimeout:3000,
		loop:true,
		autoplay:true
	});

    //слайдер товаров
    $('.product-carousel').owlCarousel({
        items:1,
        touchDrag: true,
		nav: true,
        margin: 0,
        center:true,
        loop:true,
        autoHeight: true
    });

	//кнопка вверх
	// Show or hide the sticky footer button
	$(window).scroll(function() {
		if ($(this).scrollTop() > 600) {
			$('.go-top').fadeIn(600);
		} else {
			$('.go-top').fadeOut(600);
		}
	});
	// Animate the scroll to top
	$('.go-top').click(function(event) {
		event.preventDefault();

		$('html, body').animate({scrollTop: 0}, 300);
	})


	//медленный скрол по кнопке
	$("#contacts-form").on("click","a", function (event) {
		//отменяем стандартную обработку нажатия по ссылке
		event.preventDefault();
		//забираем идентификатор бока с атрибута href
		var id  = $(this).attr('href'),
			//узнаем высоту от начала страницы до блока на который ссылается якорь
			top = $(id).offset().top;
		//анимируем переход на расстояние - top за 1500 мс
		$('body,html').animate({scrollTop: top}, 1500);
	});


	//карта
//Если на странице есть контейнер для яндекс карты с id map_container, начинаем её формировать
	if($("#map_container").length > 0)	
		{

		//yandex map
		ymaps.ready(function() {
			var map = new ymaps.Map("map_container", {
				center: [54.994923527609, 73.371036240784],	//Создаём карту с центром в городе Омск
				zoom: 17,	//Увеличение 17
			});



				//Кластера - группируем близко расположенные друг к другу объекты, чтобы при отдалении карты появлялась другая иконка
				// с количеством объектов в данной точке 

				var ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="claster" >$[properties.geoObjects.length] шт.</div>');

				//Параметры иконки кластера, обычно её делают отличной от точки, чтобы пользователь не путал номер объекта
				// и количество объектов

				var clusterIcons=[{
					href: '/bitrix/templates/dress/img/map-claster.png',
					size:[58, 80],
					offset:[-24, -80],
				}];

				//Создание самого кластера
				myClusterer = new ymaps.Clusterer({
					clusterIcons: clusterIcons,
					clusterNumbers:[1],
					zoomMargin: [30],
					clusterIconContentLayout: ClusterContent
				});


			//HTML шаблон балуна, того самого всплывающего блока, который появляется при щелчке на карту
			 var myBalloonLayout = ymaps.templateLayoutFactory.createClass(
						'<address class="address-map" >'+
						'<p><strong>$[properties.name]</strong>'+
						'<br/>'+
						'<ul class="balloon-info" >'+
						'<li><strong>Адрес:&nbsp;</strong>$[properties.address]</li>'+
						'<li><strong>Часы работы:&nbsp;</strong>$[properties.hours]</li>'+
						'<li><strong>Телефон:&nbsp;</strong>$[properties.phone]</li>'+
						'<li><strong>Руководитель:&nbsp;</strong>$[properties.manager]</li>'+
						'</ul>'+
						'</address>'
				    );

			 

			    
			    var Placemark = {};	//Пустой объекта, куда будут помещены точки на для карты
			    
			    //Перебираем все блоки с картой и считываем данные для формирования точки и балуна по ранее заданному шаблону
			    $(".shop-data").each(function(){

			    	//Координаты точки
			    	var X = $(this).attr("data-yandex-x");
			    	var Y = $(this).attr("data-yandex-y");
			    
			    		Obj = $(this).attr("pointindex");

			    		//Создаём объект с заданными координатами и доп.свойствами
			    	    Placemark[Obj] = new ymaps.Placemark([X,Y], {
			    	    	name: $(this).attr("data-name"),	//Наименование магазина
			    	    	address: $(this).attr("data-address"),	//Адрес
			    	    	hours: $(this).attr("data-hours"),	//Часы работы
			    	    	phone: $(this).attr("data-phone"),	//Контактный телефон
			    	    	manager: $(this).attr("data-shop-manager"),	//Руководитель
			                iconContent: "<div class='marker-circ'>"+"</div>",	//Порядковый номер на карте
			        },{	//Ниже некоторые параметры точки и балуна
			            balloonContentLayout: myBalloonLayout,	
			            balloonOffset: [5,0],
			            balloonCloseButton: true,
			            balloonMinWidth: 450,
			            balloonMaxWidth:450,
			            balloonMinHeught:150,
			            balloonMaxHeught:200,
			            iconImageHref: '/bitrix/templates/dress/img/map.png',	//Путь к картинке точки
			            iconImageSize: [55, 55],
			            iconImageOffset: [-24, -40],
			            iconLayout: 'default#imageWithContent',
			            iconactive: '/bitrix/templates/dress/img/map-a.png' //Путь к картинке точки при наведении курсора мыши
			            
			        });
			    	    
					
					
			    	//Добавляем маркер (точку) через кластер
			    	myClusterer.add(Placemark[Obj]);
			    
			    });
			    
			    //Добавление кластеры на карту
			    map.geoObjects.add(myClusterer); 
			    //Запрещаем изменение размеров карты по скролу мыши
				map.behaviors.disable("scrollZoom");
		}); 
	

		}

});