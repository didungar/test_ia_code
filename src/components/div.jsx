javascript
import { useState } from 'react';
import { isNumeric } from './errorDetection';

function NumericInput(props) {
  const [value, setValue] = useState('');
  const [error, setError] = useState(null);

  function handleChange(event) {
    const inputValue = event.target.value;
    if (isNumeric(inputValue)) {
      setValue(inputValue);
      setError(null);
    } else {
      setValue('');
      setError('Please enter a numeric value');
    }
  }

  return (
    <div>
      <label>{props.label}</label>
      <input type="text" value={value} onChange={handleChange} />
      {error && <p>{error}</p>}
    </div>
  );
}