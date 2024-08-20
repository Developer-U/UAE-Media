window.addEventListener('DOMContentLoaded', function(){   
    console.log('Работает');
    // Открытие табов с разделами и подразделами
    var pathNums = document.querySelectorAll('.js-pathTabs'); // все кнопки табов
            
    var targetNums = document.querySelectorAll('.js-targetTabs'); // все контенты табов  

    var targetImages = document.querySelectorAll('.js-targetImage'); // все изображения категорий

    pathNums.forEach(function(pathBtn){     
        pathBtn.addEventListener('click', function(event){  
            event.preventDefault();
            console.log(event.target);
            
            var path = event.currentTarget.dataset.path; // Определяем индекс раздела               

            // по клику деактивируем все кнопки табов
            pathNums.forEach(function(eachBtn){                    
                eachBtn.classList.remove('active');
            }); 

            // Активируем текущую кнопку
            var currentBtn = event.currentTarget; // Определяем индекс раздела            
            currentBtn.classList.add('active');
            
            // по клику отключаем все контенты
            targetNums.forEach(function(targetNum){                    
                targetNum.classList.remove('active');
            }); 

            targetImages.forEach(function(targetImage){                    
                targetImage.classList.remove('active');
            }); 

            // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
            var currentTypeTab = document.querySelector(`[data-target="${path}"]`);         
            
            var currentImage = document.querySelector(`[data-image="${path}"]`);    
        
            currentTypeTab.classList.add('active'); // Активируем первый раздел в контенте                                   
                
            currentImage.classList.add('active');
        });
    }); 
});