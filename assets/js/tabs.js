window.addEventListener('DOMContentLoaded', function(){ 
    // Открытие табов с разделами и подразделами
    var pathNums = document.querySelectorAll('.js-pathTabs'); // все кнопки табов

    pathNums.forEach(function(pathBtn){     
        pathBtn.addEventListener('click', function(event){  
            event.preventDefault();
            
            // Найдём родительский блок у табов
            let currentWrapper = event.target.closest('.block-sidebar');        

            var targetNums = currentWrapper.querySelectorAll('.js-targetTabs'); // все контенты табов 
            
            var targetImages = currentWrapper.querySelectorAll('.js-targetImage'); // все изображения категорий   
            
            var targetBtns = currentWrapper.querySelectorAll('.js-targetBtn'); // все кнопкит категорий 
            
            var path = event.currentTarget.dataset.path; // Определяем индекс раздела  
            
            var targetWrapNums = currentWrapper.querySelectorAll('.js-pathTabs'); // Кнопки данного родителя

            // по клику деактивируем все кнопки табов
            targetWrapNums.forEach(function(eachWrapBtn){                    
                eachWrapBtn.classList.remove('active');
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

            targetBtns.forEach(function(targetBtn){                    
                targetBtn.classList.remove('active');
            }); 

            // Закинем в переменную текущий Таб с соответствующим атрибутом data-target       
            var currentTypeTab = document.querySelector(`[data-target="${path}"]`);         
            
            var currentImage = document.querySelector(`[data-image="${path}"]`);    

            var currentBtn = document.querySelector(`[data-btn="${path}"]`); 
        
            currentTypeTab.classList.add('active'); // Активируем первый раздел в контенте                                   
                
            currentImage.classList.add('active');

            currentBtn.classList.add('active');
        });
    }); 
});