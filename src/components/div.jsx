import React, { useState } from 'react';

function NumberWithoutDecimals(props) {
  const [number, setNumber] = useState(0);

  return (
    <div>
      <h1>{Math.floor(number)}</h1>
      <button onClick={() => setNumber(number + 1)}>Increment</button>
      <button onClick={() => setNumber(number - 1)}>Decrement</button>
    </div>
  );
}