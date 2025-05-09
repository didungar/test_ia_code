import React, { useState } from 'react';

function App() {
  const [data, setData] = useState([]);

  function handleCancel() {
    // Annuler l'opération
    // Mettre à jour le display avec les nouveaux données
    setData([...data, { name: 'New Item', quantity: 1 }]);
  }

  return (
    <div>
      <button onClick={handleCancel}>Annuler</button>
      <ul>
        {data.map((item) => (
          <li key={item.name}>{item.name}: {item.quantity}</li>
        ))}
      </ul>
    </div>
  );
}