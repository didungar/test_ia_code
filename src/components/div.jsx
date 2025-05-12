import React, { useState } from 'react';

function Input() {
  const [number, setNumber] = useState(0);

  return (
    <div>
      <input
        type="number"
        value={number}
        onChange={e => setNumber(parseInt(e.target.value))}
      />
      <button onClick={() => console.log(number)}>Afficher le nombre</button>
    </div>
  );
}