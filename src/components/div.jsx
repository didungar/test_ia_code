import React, { useState } from 'react';

function Saisie() {
  const [value, setValue] = useState('');
  const [error, setError] = useState(null);

  function handleChange(event) {
    const newValue = event.target.value;
    if (newValue === '') {
      setError('Le champ est obligatoire');
    } else {
      setError(null);
    }
    setValue(newValue);
  }

  return (
    <div>
      <input type="text" value={value} onChange={handleChange} />
      {error && <p>{error}</p>}
    </div>
  );
}