javascript
import React, { useState } from 'react';

function SpecialCases(props) {
  const [number, setNumber] = useState('');
  const [specialCase, setSpecialCase] = useState('');

  function handleChange(event) {
    const { value } = event.target;
    setNumber(value);
    if (value < 0) {
      setSpecialCase('Negative number');
    } else if (value === 0) {
      setSpecialCase('Zero');
    } else {
      setSpecialCase('Positive number');
    }
  }

  return (
    <>
      <input type="text" value={number} onChange={handleChange} />
      <p>{specialCase}</p>
    </>
  );
}