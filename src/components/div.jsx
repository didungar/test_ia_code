import React, { useState } from 'react';

function Display({ result }) {
  const [precision, setPrecision] = useState(2);

  return (
    <div>
      <p>Result: {result.toFixed(precision)}</p>
      <button onClick={() => setPrecision(3)}>
        Show more decimals
      </button>
      <button onClick={() => setPrecision(2)}>
        Show less decimals
      </button>
    </div>
  );
}

export default Display;