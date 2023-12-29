package visitor;

public class UnderlyingText implements Operation{
    @Override
    public void apply(Anchor anchor) {
        System.out.println("anchor node is under lied! ");
    }
}
