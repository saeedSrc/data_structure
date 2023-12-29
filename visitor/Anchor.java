package visitor;

public class Anchor extends HTMLNode{
    @Override
    public void exec(Operation operation) {
        operation.apply(this);
    }
}
