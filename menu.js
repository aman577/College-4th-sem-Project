function showMenu(id) {
    document.getElementById(`menu-${id}`).style.display = 'block';
  }
  
  function hideMenu(id) {
    document.getElementById(`menu-${id}`).style.display = 'none';
  }
  
  function showPrice(serviceName, price) {
    const tooltip = document.getElementById('price-tooltip');
    tooltip.innerText = `${serviceName}: ${price}`;
    tooltip.style.display = 'block';
  
    document.addEventListener('mousemove', (e) => {
      tooltip.style.top = `${e.pageY + 10}px`;
      tooltip.style.left = `${e.pageX + 10}px`;
    });
  }
  
  function hidePrice() {
    const tooltip = document.getElementById('price-tooltip');
    tooltip.style.display = 'none';
  }
  