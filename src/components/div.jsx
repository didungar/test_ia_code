import React, { useState } from 'react';

function TextInput() {
  const [text, setText] = useState('');
  const [error, setError] = useState(false);

  function handleChange(e) {
    const text = e.target.value;
    if (text === '') {
      setError(true);
    } else {
      setText(text);
      setError(false);
    }
  }

  return (
    <div>
      <input type="text" value={text} onChange={handleChange} />
      {error && <p className="error">Le champ ne peut pas être vide.</p>}
    </div>
  );
}