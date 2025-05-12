// input.js
import { useState } from 'react';

function Input(props) {
  const [value, setValue] = useState('');

  const handleChange = (event) => {
    setValue(event.target.value);
  };

  return (
    <div>
      <input type="text" value={value} onChange={handleChange} />
      <button onClick={() => props.onSubmit(value)}>Submit</button>
    </div>
  );
}

export default Input;