// Import necessary libraries
import React from 'react';
import renderer from 'react-test-renderer';
import { shallow } from 'enzyme';

// Define the component to test
const Divider = (props) => {
  const [result, setResult] = useState(null);

  return (
    <div>
      <input type="number" value={props.a} onChange={e => setA(e.target.value)} />
      <input type="number" value={props.b} onChange={e => setB(e.target.value)} />
      <button onClick={() => setResult((props.a / props.b).toFixed(2))}>Divide</button>
      <p>Result: {result}</p>
    </div>
  );
};

// Define the test suite
describe('<Divider />', () => {
  it('should divide two numbers correctly', () => {
    const component = shallow(<Divider a={10} b={2} />);
    const result = component.find('p').text();
    expect(result).toBe('5');
  });
});